<?php

namespace App\Voyager\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class PolymorphicFormField extends AbstractHandler
{
    protected $codename = 'polymorphic';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {

        return view("vendor.voyager.formfields.{$this->codename}", compact(
            'row', 'options',
            'dataType', 'dataTypeContent',
        ));
    }
}
