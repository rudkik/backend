@if(isset($view) && $view === 'browse')
    @php
        $params = [
            'field' => $row->field,
            'class' => get_class($data),
            'id' => $data->id,
            'sort' => $sort
        ];
    @endphp
    <span hidden>{{ $data->{$row->field} }}</span>
    @if (!($loop->parent->first && $loop->parent->last))
        @if (!$loop->parent->first)
            <a href="{{route('voyager.order_row', array_merge($params, ['direction' => 'first']))}}">
                <img src="{{URL::asset('/voyager-assets/images/position/first.png')}}" title="first" style="width:31px; height: 25px;" />
            </a>
            <a href="{{route('voyager.order_row', array_merge($params, ['direction' => 'up']))}}">
                <img src="{{URL::asset('/voyager-assets/images/position/up.png')}}" title="up" style="width:31px; height: 25px;" />
            </a>
        @endif
        @if (!$loop->parent->last)
            <a href="{{route('voyager.order_row', array_merge($params, ['direction' => 'down']))}}">
                <img src="{{URL::asset('/voyager-assets/images/position/down.png')}}" title="down" style="width:31px; height: 25px;" />
            </a>
            <a href="{{route('voyager.order_row', array_merge($params, ['direction' => 'last']))}}">
                <img src="{{URL::asset('/voyager-assets/images/position/last.png')}}" title="last" style="width:31px; height: 25px;" />
            </a>
        @endif
    @endif

@else

<input type="number"
       class="form-control"
       name="{{ $row->field }}"
       data-name="{{ $row->display_name }}"
       step="any"
       @if($row->required == 1) required @endif
       placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
       value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@else{{old($row->field)}}@endif">

@endif
