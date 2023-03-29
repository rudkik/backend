<?php

use App\Http\Controllers\Api\AnalyticController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\HandbookCropCategoryController;
use App\Http\Controllers\Api\HandbookCropController;
use App\Http\Controllers\Api\HandbookCompanyTypeController;
use App\Http\Controllers\Api\HandbookCityController;
use App\Http\Controllers\Api\HandbookCountryController;
use App\Http\Controllers\Api\HandbookRegionController;
use App\Http\Controllers\Api\MainMenuController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SupplyController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\V1\DependentDropdownController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'api', 'prefix' => 'v1'], function() {
    Route::post('dependent-dropdown', [DependentDropdownController::class, 'index'])->name('api.v1.dropdown');
});

// Auth
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function() {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('refresh-token', [AuthController::class, 'refreshToken'])->name('refresh.token');
    //step-1
    Route::post('send-code', [AuthController::class, 'sendCode'])->name('send-code');
    //step-2
    Route::post('confirm-code', [AuthController::class, 'confirmCode'])->name('confirm-code');
    //step-3
    Route::post('info-individual', [AuthController::class, 'infoIndividual'])->name('info-individual');
    Route::post('info-entity', [AuthController::class, 'infoCompany'])->name('info-entity');
    //step-4
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('profile', [AuthController::class, 'profile']);
});

Route::get('content/analytic', [AnalyticController::class, 'index'])->name('analytic.index');
Route::get('supply', [SupplyController::class, 'index'])->name('supply.index');
Route::get('main-menu', [MainMenuController::class, 'index'])->name('main-menu');
Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('handbook-cities', [HandbookCityController::class, 'index'])->name('handbook-cities');
Route::get('handbook-regions', [HandbookRegionController::class, 'index'])->name('handbook-regions');
Route::get('handbook-countries', [HandbookCountryController::class, 'index'])->name('handbook-countries');
Route::get('handbook-crop-categories', [HandbookCropCategoryController::class, 'index'])->name('handbook-crop-categories');
Route::get('handbook-crops', [HandbookCropController::class, 'index'])->name('handbook-crops');
Route::get('handbook-company-types', [HandbookCompanyTypeController::class, 'index'])->name('handbook-company-types');

