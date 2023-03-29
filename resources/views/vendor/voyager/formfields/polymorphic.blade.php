@if(isset($options->model) && isset($options->type))
    @if(class_exists($options->model))
        @php $relationshipField = $row->field; @endphp

        @if($options->type == 'morphedByMany')
            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                    $selected_values = isset($relationshipData) ? $relationshipData->morphedByMany($options->model, $options->pivot_name)->get()->map(function ($item, $key) use ($options) {
                        return $item->{$options->label};
                    })->all() : array();
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
                                <li>{{ $selected_value }}</li>
                            @endforeach
                        </ul>
                    @endif
                @endif

            @else
                <select
                    class="form-control select2-ajax @if(isset($options->taggable) && $options->taggable === 'on') taggable @endif"
                    name="{{ $relationshipField }}[]" multiple
                    data-get-items-route="{{route('voyager.' . $dataType->slug.'.relation')}}"
                    data-get-items-field="{{$row->field}}"
                    @if(!is_null($dataTypeContent->getKey())) data-id="{{$dataTypeContent->getKey()}}" @endif
                    data-method="{{ !is_null($dataTypeContent->getKey()) ? 'edit' : 'add' }}"
                    @if(isset($options->taggable) && $options->taggable === 'on')
                    data-route="{{ route('voyager.'.\Illuminate\Support\Str::slug($options->table).'.store') }}"
                    data-label="{{$options->label}}"
                    data-error-message="{{__('voyager::bread.error_tagging')}}"
                    @endif
                    @if($row->required == 1) required @endif
                >
                    @php
                        $selected_keys = [];
                        $model_table = (new $options->model)->getTable();
                        if (!is_null($dataTypeContent->getKey())) {
                            $selected_keys = $dataTypeContent->morphedByMany(
                                $options->model,
                                $options->pivot_name,
                            )->pluck( $model_table.'.'.$options->key);
                        }
                        $selected_keys = old($relationshipField, $selected_keys);
                        $selected_values = app($options->model)->whereIn($options->key, $selected_keys)->pluck($options->label, $options->key);
                    @endphp

                    @if(!$row->required)
                        <option value="">{{__('voyager::generic.none')}}</option>
                    @endif

                    @foreach ($selected_values as $key => $value)
                        <option value="{{ $key }}" selected="selected">{{ $value }}</option>
                    @endforeach

                </select>

            @endif
            @endif
    @else

        cannot make relationship because {{ $options->model }} does not exist.

    @endif
@endif
