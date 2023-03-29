<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainMenuResource;
use App\Models\MainMenu;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MainMenuController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return MainMenuResource::collection(MainMenu::all());
    }
}
