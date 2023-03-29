@section('resumable')
    <div class="resumable">
        <div class="dropzone form-control" ref="dropzone">
            <i class="voyager-download"></i>
            <span class="dropzone-display">
                Перетащите или нажмите, чтобы загрузить файл
            </span>
        </div>
        <resumable-file
            v-for="(file, index) in files"
            v-bind:key="file.file.uniqueIdentifier + index"
            :file="file.file"
            :status="file.status"
            :progress="file.progress"
            @cancel="cancelFile"
        />
    </div>
@endsection

@section('resumable-file')
    <div class="resumable-file">
        <span :class="{
            'status-canceled': status == 'canceled'
        }"> @{{ file.fileName }} </span>
        <small v-if="status == 'success'">загружено!</small>
        <small v-else-if="status == 'retrying'">ошибка, повторная попытка...</small>
        <small v-else-if="status == 'error'">ошибка! не удается загрузить файл</small>
        <small v-else-if="status == 'canceled'">отменено</small>
        <small v-else-if="status == 'uploading'">загрузка @{{ uploadedAmount }}%</small>

        <span v-if="isUploading">
            <button type="button" v-if="isPaused" @click="resume()">продолжить</button>
            <button type="button" v-else @click="pause()">пауза</button>
            <button type="button" @click="cancel()">отмена</button>
        </span>

    </div>
@endsection

<script>
    Vue.component('resumable-file', {
        template: `@yield('resumable-file')`,
        props: [
            'file',
            'status',
            'progress',
        ],
        data(){
            return {
                isPaused: false // we upload straight away by default
            }
        },
        computed: {
            isUploading(){
                return (this.status !=='success' && this.status !== 'canceled')
            },
            uploadedAmount(){
                return (this.progress * 100).toFixed(2)
            },
        },
        methods: {
            upload(){
                this.file.resumableObj.upload()
                this.isPaused = false
            },
            pause(){
                this.file.pause()
                this.isPaused = true
            },
            resume(){
                this.pause() // not sure why, but we have to call pause again before upload will resume
                this.upload()
            },
            cancel(){
                this.$emit('cancel', this.file)
            }
        }
    })
    Vue.component('resumable', {
        template: `@yield('resumable')`,
        data(){
            return {
                files: [], // our local files array, we will pack in extra data to force reactivity
                r: false
            }
        },
        props: [ 'target' ],
        methods: {
            // finds the file in the local files array
            findFile(file){
                return this.files.find(item => item.file.uniqueIdentifier === file.uniqueIdentifier && item.status !== 'canceled') ?? {}
            },
            // cancel an individual file
            cancelFile(file){
                this.findFile(file).status = 'canceled'
                file.cancel()
            }
        },
        mounted(){
            // init resumablejs on mount
            this.r = new Resumable({
                target: this.target,
                chunkSize: 1 * 1024 * 1024, // 1MB
                query: { // CSRF token
                    _token: '{{ csrf_token() }}'
                },
                simultaneousUploads: 1,
                testChunks: false,
                throttleProgressCallbacks: 1,
            });
            // Resumable.js isn't supported, fall back on a different method
            if(!this.r.support) return alert('Your browser doesn\'t support chunked uploads. Get a better browser.');
            this.r.assignBrowse(this.$refs.dropzone);
            this.r.assignDrop(this.$refs.dropzone);
            // set up event listeners to feed into vues reactivity
            this.r.on('fileAdded', (file, event) => {
                file.hasUploaded = false
                // keep a list of files with some extra data that we can use as props
                this.files.push({
                    file,
                    status: 'uploading',
                    progress: 0
                })
                this.r.upload()
            })
            this.r.on('fileSuccess', (file, event) => {
                this.findFile(file).status = 'success'
                this.$emit('file-success', JSON.parse(event))
            })
            this.r.on('fileError', (file, event) => {
                this.findFile(file).status = 'error'
            })
            this.r.on('fileRetry', (file, event) => {
                this.findFile(file).status = 'retrying'
            })
            this.r.on('fileProgress', (file) => {
                // console.log('fileProgress', progress)
                var localFile = this.findFile(file)
                // if we are doing multiple chunks we may get a lower progress number if one chunk response comes back early
                var progress = file.progress()
                if( progress > localFile.progress)
                    localFile.progress = progress
            })
        }
    })
</script>

