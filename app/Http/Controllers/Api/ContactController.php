<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ContactController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ContactResource::collection(Contact::all());
    }
}
