<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HandbookCountryResource;
use App\Models\HandbookCountry;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HandbookCountryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return HandbookCountryResource::collection(HandbookCountry::all());
    }
}
