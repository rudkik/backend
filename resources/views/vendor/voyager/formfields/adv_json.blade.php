<div class="adv-json-wrapper">
    @php
        if(!isset($options->json_fields)) {
            $options->json_fields->key = 'Key';
            $options->json_fields->value = 'Value';
        }
    @endphp

    <input id="{{$row->field}}" name="{{$row->field}}" type="hidden" value="{{ $dataTypeContent->{$row->field} }}">
    <div id="adv-json-list-{{$row->field}}" class="adv-json-list {{$row->field}}" data-field="{{$row->field}}">

        @if($fieldsData = json_decode($dataTypeContent->{$row->field}))
            @foreach($fieldsData->rows as $key => $field)
                <div class="adv-json-item">
                    @foreach($options->json_fields as $fieldName => $label)
                        <div class="form-group-line">
                            @php
                                $type = $options->types->$fieldName ?? '';
                                $fieldValue = $field->$fieldName;
                            @endphp
                            @if($type == 'checkbox')
                                <input type="number" data-master-field="{{$row->field}}"
                                       data-field="{{ $fieldName }}" data-title="{{ $fieldsData->fields->{$fieldName} }}"
                                       class="form-control"
                                       value="{{ $fieldValue }}"
                                       min="0" max="1"
                                />
                            @else
                                <input type="{{ $type ?? 'text' }}" data-master-field="{{$row->field}}"
                                       data-field="{{ $fieldName }}" data-title="{{ $fieldsData->fields->{$fieldName} }}"
                                       class="form-control"
                                       value="{{ $fieldValue }}" />
                            @endif
                        </div>
                    @endforeach
                    <div class="form-group-line">
                        <button data-field="{{ $row->field }}" type="button" class="btn btn-danger remove-json"><i
                                class='voyager-x'></i></button>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
    <div class="adv-json-add-holder">
        <div class="adv-json-add-form">
            @foreach($options->json_fields as $key => $value)
                <div class="form-group-line">
                    @php $type = $options->types->$key ?? '';
                    @endphp
                    @if($type == 'checkbox')
                        <label for="{{$row->field.'-'.$key}}">{{$value}} ({{$key}}) (0 | 1)</label>
                        <input id="{{$row->field.'-'.$key}}" type="number" data-master-field="{{$row->field}}"
                               data-field="{{$key}}" data-title="{{$value}}"
                               class="form-control"
                               min="0" max="1"
                        >
                    @else
                        <label for="{{$row->field.'-'.$key}}">{{$value}} ({{$key}})</label>
                        <input id="{{$row->field.'-'.$key}}" type="{{ $type ?? 'text'}}" data-master-field="{{$row->field}}"
                               data-field="{{$key}}" data-title="{{$value}}"
                               class="form-control"
                        >
                    @endif

                </div>
            @endforeach
            <div class="form-group-line">
                <button data-field="{{$row->field}}" data-remove="<i class='voyager-x'></i>" type="button"
                        class="btn btn-success add-json"><i class='voyager-list-add'></i></button>
            </div>
        </div>
    </div>
</div>
