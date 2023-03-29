<?php

namespace App\Voyager\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class DateRangeFormField extends AbstractHandler
{

    protected $codename = 'date_range';
    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        $storeFormat = 'YYYY-MM-DD';
        $displayFormat = $options->displayFormat ?? 'DD.MM.YYYY';

        return view('vendor.voyager.formfields.date_range', compact('row', 'storeFormat', 'displayFormat'));
    }
}
