<?php
$all = $getAll ?? false;
$field = $field ?? null;
$numberReadOnly = $numberReadOnly ?? null;
$except = $except ?? [];
$collection = collect($except);
?>
@foreach($dataTypeRows as $row)
    <?php
    if($collection->contains($row->field)){
        continue;
    }
    ?>
    @if ($row->field == $field || $all)
        <!-- GET THE DISPLAY OPTIONS -->
        @php
            $display_options = $row->details->display ?? NULL;
            if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
            }
        @endphp
        @if (isset($row->details->legend) && isset($row->details->legend->text))
            <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
        @endif
        <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
            {{ $row->slugify }}
            <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
            @include('voyager::multilingual.input-hidden-bread-edit-add')
            @if (isset($row->details->view))
                @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
            @elseif ($row->type == 'relationship')
                @if ($row->field === 'advertisement_hasmany_advertisement_file_relationshipp')
                    @include('vendor.voyager.advertisements.files', ['options' => $row->details])
                @endif
                @include('voyager::formfields.relationship', ['options' => $row->details])
            @elseif($numberReadOnly)
                @include('voyager::_base._number', ['options' => $row->details])
            @else
                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
            @endif

            @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                {!! $after->handle($row, $dataType, $dataTypeContent) !!}
            @endforeach
            @if ($errors->has($row->field))
                @foreach ($errors->get($row->field) as $error)
                    <span class="help-block">{{ $error }}</span>
                @endforeach
            @endif
        </div>
    @endif
@endforeach

