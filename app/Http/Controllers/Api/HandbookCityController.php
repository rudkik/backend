<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HandbookCityResource;
use App\Models\HandbookCity;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HandbookCityController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return HandbookCityResource::collection(HandbookCity::all());
    }
}
