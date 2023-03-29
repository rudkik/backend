<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HandbookCropCategoryResource;
use App\Models\HandbookCropCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HandbookCropCategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return HandbookCropCategoryResource::collection(HandbookCropCategory::all());
    }
}
