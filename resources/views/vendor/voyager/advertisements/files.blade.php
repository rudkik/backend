@if(isset($options->model) && isset($options->type))
    @if(class_exists($options->model))
        @php $relationshipField = $row->field; @endphp

        @if(isset($view) && ($view == 'browse' || $view == 'read'))
            @php
                $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                $model = app($options->model);

                $selected_values = $model::where($options->column, '=', $relationshipData->{$options->key})->get()->map(function ($item, $key) use ($options) {
                    return $item->{$options->label};
                })->all();
            @endphp

            @if($view == 'browse')
                @php
                    $string_values = implode(", ", $selected_values);
                    if(mb_strlen($string_values) > 25){ $string_values = mb_substr($string_values, 0, 25) . '...'; }
                @endphp
                @if(empty($selected_values))
                    <p>{{ __('voyager::generic.no_results') }}</p>
                @else
                    <p>{{ $string_values }}</p>
                @endif
            @else
                @if(empty($selected_values))
                    <p>{{ __('voyager::generic.no_results') }}</p>
                @else
                    <ul>
                        @foreach($selected_values as $selected_value)
                            <img src="{{ Voyager::file( $selected_value ) }}"
                                 data-file-name="{{ ($selected_value) }}" data-id="{{ $selected_value }}"
                                 style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
                        @endforeach
                    </ul>
                @endif
            @endif
        @else

            @php
                $model = app($options->model);
                $query = $model::where($options->column, '=', $dataTypeContent->{$options->key})->get();
            @endphp

            @if(isset($query))
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul id="event-images">
                            @foreach($query as $query_res)
                                @php($path = $query_res->path)
                                <div data-field-name="image[]">
                                    <a href="#" class="voyager-x remove-single-image" style="position:absolute;"></a>
                                    <img src="@if( !filter_var($path, FILTER_VALIDATE_URL)){{ Voyager::file( $path ) }}@else{{ $path }}@endif"
                                         data-file-name="{{ $path }}" data-id="{{ $query_res->id }}"
                                         style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
                                </div>
                            @endforeach
                            @if($query->count() < 5)
                                <input class="input-files" type="file" name="files[]" onchange="addFileInput(this)" accept="file/*">
                            @endif
                        </ul>
                    </div>
                </div>
            @else
                <p>{{ __('voyager::generic.no_results') }}</p>
            @endif
            <script>
                const startFileCount = {{ $query->count() }};
                let addedFileCount = 0;
                const files = [];

                function addFileInput(self) {
                    if (self.files && (addedFileCount + startFileCount < 3)) {
                        const alreadyExist = files.find(item => item[0].name === self.files[0].name) !== undefined;
                        if (alreadyExist === false) {
                            files.push(self.files);
                            addedFileCount++;
                        } else {
                            self.remove();
                        }
                        document.getElementById('event-images').insertAdjacentHTML('beforeend', '<input class="input-files" type="file" name="files[]" onchange="addFileInput(this)" accept="file/*">');
                    }
                }
            </script>
        @endif


    @else

        cannot make relationship because {{ $options->model }} does not exist.

    @endif

@endif

