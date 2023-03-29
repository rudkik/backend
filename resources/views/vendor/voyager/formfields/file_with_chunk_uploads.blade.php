<div>
    <div id="resumable_{{ $row->field }}" class="resumable-wrapper">
        <ul>
            <li v-for="file in files" :class="{'status-canceled': !limitedFiles.includes(file) }">
                <a :href="`/storage/${file}`" target="_blank">@{{ file }}</a>
                <button type="button" @click="removeFile(file)">удалить</button>
            </li>
        </ul>
        <resumable :target="target" ref="resumable" @file-success="fileSuccess" :max-files="maxFiles"></resumable>
        <input v-if="!multipleFilesSupport" type="hidden" name="{{ $row->field }}" :value="value">
        <input v-else type="hidden" v-for="(file, index) in limitedFiles" :key="index" :name="`{{ $row->field }}[${index}]`" :value="file">
    </div>
</div>

@push('javascript')
    <script>
        Vue.devtools = true;
        new Vue({
            el: '#resumable_{{ $row->field }}',
            data() {
                return {
                    oldValue: `{{ $oldValue }}`,
                    target: `{{ route('voyager.chunks.store', [ 'slug' => $dataType->slug ]) }}`,
                    files: [],
                    maxFiles: @if(isset($options->resumable) && $options->resumable->maxFiles)`{{$options->resumable->maxFiles}}`@else undefined @endisset
                }
            },
            computed: {
                multipleFilesSupport() {
                    return this.maxFiles == undefined || this.maxFiles > 1;
                },
                limitedFiles(){
                    if(this.files.length > this.maxFiles){
                        return this.files.slice(-this.maxFiles)
                    }
                    return this.files
                },
                value(){
                    if(this.multipleFilesSupport){
                        return JSON.stringify(this.limitedFiles)
                    }
                    if(!this.files.length){
                        return ""
                    }
                    return this.files[this.files.length - 1]
                }
            },
            methods: {
                fileSuccess(file){
                    this.files.push(file)
                },
                removeFile(file){
                    let _this = this
                    $.post('{{ route('voyager.media.delete') }}', {
                        path: file,
                        files: [{name: '', type: 'file'}],
                        _token: '{{ csrf_token() }}'
                    }, function(data){
                        _this.files = _this.files.filter(item => item !== file)
                    });
                }
            },
            created(){
                if(!this.oldValue){
                    return
                }
                try{
                    this.files = JSON.parse(this.oldValue.replace(/&quot;/g,'"'))
                }
                catch (e){
                    this.files.push(this.oldValue)
                }

            }
        });
    </script>
@endpush
