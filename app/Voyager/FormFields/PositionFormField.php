<?php

namespace App\Voyager\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class PositionFormField extends AbstractHandler
{
    protected $codename = 'position';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('vendor.voyager.formfields.position', compact('row', 'dataType', 'dataTypeContent', 'options'));
    }
}
