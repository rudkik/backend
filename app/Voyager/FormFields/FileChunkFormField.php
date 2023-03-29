<?php

namespace App\Voyager\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class FileChunkFormField extends AbstractHandler
{

    protected $codename = 'file_with_chunk_uploads';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        $oldValue = $dataTypeContent->{$row->field};
        if(is_array($dataTypeContent->{$row->field})){
            $oldValue = json_encode($oldValue);
        }
        return view('voyager::formfields.file_with_chunk_uploads',
            compact('row', 'dataType', 'dataTypeContent', 'options', 'oldValue')
        );
    }
}
