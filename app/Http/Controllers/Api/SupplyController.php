<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplyResource;
use App\Models\Supply;


class SupplyController extends Controller
{
    public function index()
    {
        $item = Supply::query()->first();
        if(!$item){
            return $this->CustomError('Запись не найдена');
        }
        return new SupplyResource($item);
    }
}
