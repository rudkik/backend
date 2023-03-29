<label class="daterangepicker-wrapper ">
    <i class="voyager-calendar"></i>
    <input class="form-control"
           type="text"
           name="{{ $row->field }}-picker"
           data-name="{{ $row->display_name }}"
           @if($row->required == 1) required @endif
           step="any"
           value="">
    <i class="voyager-sort-desc"></i>
</label>
<input type="hidden" name="{{ $row->field }}" value="{{ old($row->field) }}">

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
        let displayFormat = '{{ $displayFormat }}',
            storeFormat = '{{ $storeFormat }}',
            picker = $('input[name="{{ $row->field }}-picker"]'),
            input = $('input[name="{{ $row->field }}"]')

        function cb(start, end) {
            input.val(start.format(storeFormat) + ', ' + end.format(storeFormat));
        }
        picker.daterangepicker({
            locale: {
                firstDay: 1,
                format: displayFormat
            },
            ranges: {
                'Сегодня': [moment(), moment()],
                'Вчера': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Последние 7 дней': [moment().subtract(6, 'days'), moment()],
                'Последние 30 дней': [moment().subtract(29, 'days'), moment()],
                'Этот месяц': [moment().startOf('month'), moment().endOf('month')],
                'Предыдущий месяц': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
        let initialValue = picker.val(),
            initialValues = initialValue.split(' - ')
        input.val(`${moment(initialValues[0], displayFormat).format(storeFormat)}, ${moment(initialValues[1], displayFormat).format(storeFormat)}`)


    })
</script>
