<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HandbookCropResource;
use App\Models\HandbookCrop;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HandbookCropController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return HandbookCropResource::collection(HandbookCrop::all());
    }
}
