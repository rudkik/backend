<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HandbookRegionResource;
use App\Models\HandbookRegion;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HandbookRegionController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return HandbookRegionResource::collection(HandbookRegion::all());
    }
}
