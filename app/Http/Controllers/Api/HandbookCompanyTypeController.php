<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HandbookCompanyTypeResource;
use App\Models\HandbookCompanyType;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HandbookCompanyTypeController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return HandbookCompanyTypeResource::collection(HandbookCompanyType::all());
    }
}
