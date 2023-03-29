<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnalyticResource;
use App\Http\Resources\ContactResource;
use App\Models\Analytic;
use App\Models\Contact;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AnalyticController extends Controller
{
    public function index()
    {
        $item = Analytic::query()->first();
        if(!$item){
            return $this->CustomError('Запись не найдена');
        }
        return new AnalyticResource($item);
    }
}
