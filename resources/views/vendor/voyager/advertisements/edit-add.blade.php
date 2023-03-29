@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <!-- form start -->
        <form role="form"
              id="form-edit-add"
              class="form-edit-add"
              action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
              method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-8">

                    <div class="panel panel-bordered">
                        <!-- PUT Method if we are editing -->
                    @if($edit)
                        {{ method_field("PUT") }}
                    @endif

                    <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <!-- Adding / Editing -->
                            <div class="form-group col-md-12">
                                <!-- ### DETAILS ### -->
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                            @endphp
                            @include('voyager::_base._base', ['getAll' => true, 'except'=> [
                                                            'handbook_advertisement_type_id_relationship',
                                                            'handbook_advertisement_category_id_relationship',
                                                            'handbook_crop_category_id_relationship',
                                                            'handbook_crop_id_relationship',
                                                            'handbook_crop_type_id_relationship',
                                                            'crop_year',
                                                            'moisture',
                                                            'weed_impurity',
                                                            'pest_infestation',
                                                            'comment_infestation',
                                                    ], 'dataTypeRows' => $dataTypeRows, 'dataTypeContent' => $dataTypeContent, 'dataType' => $dataType, 'edit' => $edit, 'errors' => $errors])

                        </div><!-- panel-body -->
                                <div class="panel-footer">
                                    @section('submit-buttons')
                                        <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                                    @stop
                                    @yield('submit-buttons')
                                </div>
                    </div>
                </div>
            </div>
                <div class="col-md-4">
                    <!-- ### DETAILS ### -->
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i> Тип объявления</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @include('voyager::_base._base', ['field' => 'handbook_advertisement_type_id_relationship', 'getAll' => false, 'dataTypeRows' => $dataTypeRows, 'dataTypeContent' => $dataTypeContent, 'dataType' => $dataType, 'edit' => $edit, 'errors' => $errors])
                            @include('voyager::_base._base', ['field' => 'handbook_advertisement_category_id_relationship', 'getAll' => false, 'dataTypeRows' => $dataTypeRows, 'dataTypeContent' => $dataTypeContent, 'dataType' => $dataType, 'edit' => $edit, 'errors' => $errors])
{{--                            @include('voyager::_base._base', ['field' => 'handbook_crop_category_id_relationship', 'getAll' => false, 'dataTypeRows' => $dataTypeRows, 'dataTypeContent' => $dataTypeContent, 'dataType' => $dataType, 'edit' => $edit, 'errors' => $errors])--}}
{{--                            @include('voyager::_base._base', ['field' => 'handbook_crop_id_relationship', 'getAll' => false, 'dataTypeRows' => $dataTypeRows, 'dataTypeContent' => $dataTypeContent, 'dataType' => $dataType, 'edit' => $edit, 'errors' => $errors])--}}
                            @include('voyager::_base._base', ['field' => 'handbook_crop_type_id_relationship', 'getAll' => false, 'dataTypeRows' => $dataTypeRows, 'dataTypeContent' => $dataTypeContent, 'dataType' => $dataType, 'edit' => $edit, 'errors' => $errors])
                        </div>
                    </div>
                    <!-- ### DETAILS ### -->
                    <div class="panel panel panel-bordered panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i> Свойства </h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @include('voyager::_base._base', ['field' => 'crop_year', 'getAll' => false, 'dataTypeRows' => $dataTypeRows, 'dataTypeContent' => $dataTypeContent, 'dataType' => $dataType, 'edit' => $edit, 'errors' => $errors])
                            @include('voyager::_base._base', ['field' => 'moisture', 'getAll' => false, 'dataTypeRows' => $dataTypeRows, 'dataTypeContent' => $dataTypeContent, 'dataType' => $dataType, 'edit' => $edit, 'errors' => $errors])
                            @include('voyager::_base._base', ['field' => 'weed_impurity', 'getAll' => false, 'dataTypeRows' => $dataTypeRows, 'dataTypeContent' => $dataTypeContent, 'dataType' => $dataType, 'edit' => $edit, 'errors' => $errors])
                            @include('voyager::_base._base', ['field' => 'pest_infestation', 'getAll' => false, 'dataTypeRows' => $dataTypeRows, 'dataTypeContent' => $dataTypeContent, 'dataType' => $dataType, 'edit' => $edit, 'errors' => $errors])
                            @include('voyager::_base._base', ['field' => 'comment_infestation', 'getAll' => false, 'dataTypeRows' => $dataTypeRows, 'dataTypeContent' => $dataTypeContent, 'dataType' => $dataType, 'edit' => $edit, 'errors' => $errors])
                        </div>
                    </div>
        </form>


        <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
              enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
            <input name="image" id="upload_file" type="file"
                   onchange="$('#my_form').submit();this.value='';">
            <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
            {{ csrf_field() }}
        </form>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
@endif

        $('.side-body input[data-slug-origin]').each(function(i, el) {
            $(el).slugify();
        });

        $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
        $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
        $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
        $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

        $('#confirm_delete').on('click', function(){
            $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop

