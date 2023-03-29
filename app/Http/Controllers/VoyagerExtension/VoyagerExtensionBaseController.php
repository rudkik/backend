<?php

namespace App\Http\Controllers\VoyagerExtension;

use App\Voyager\ContentTypes\CoordinateType;
use Illuminate\Http\Request;
use MonstreX\VoyagerExtension\Controllers\VoyagerExtensionBaseController as BaseController;

class VoyagerExtensionBaseController extends BaseController
{
    public function getContentBasedOnType(Request $request, $slug, $row, $options = null)
    {
        switch ($row->type) {
            case 'coordinates':
                return (new CoordinateType($request, $slug, $row, $options))->handle();
            default:
                return parent::getContentBasedOnType($request, $slug, $row, $options);
        }
    }

    public function insertUpdateData($request, $slug, $rows, $data)
    {
        // Берем не полиморфные типы так как не хотим попасть под категорию relationship
        // костыль Вояжера там если это не связь belongsToMany то записывает по полю нам это не нужно
        $filtered = $rows->reject(function ($value, $key){
            return $value->type === 'polymorphic';
        });
        $result = parent::insertUpdateData($request, $slug, $filtered, $data);
        $multi_select_morph = [];

        foreach ($rows as $row) {
            if ($row->type == 'polymorphic' && $row->details->type == 'morphedByMany') {
                $multi_select_morph[] = [
                    'model' => $row->details->model,
                    'content' => $this->getContentBasedOnType($request, $slug, $row, $row->details),
                    'pivot_name' => $row->details->pivot_name,
                ];
            }
        }

        foreach ($multi_select_morph as $sync_data) {
            $data->morphedByMany(
                $sync_data['model'],
                $sync_data['pivot_name'],
            )->sync($sync_data['content']);
        }
        return $result;
    }
}
