    @if(isset($dataTypeContent->field) && isset($dataTypeContent->attribute))
        @include('voyager::formfields.select_dependent_dropdown.partials._add_edit')
    @else
        @include('voyager::formfields.select_dependent_dropdown.partials._add')
    @endif
