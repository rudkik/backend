<?php

namespace App\Providers;

use App\FormFields\SelectDependentDropdown;
use App\Voyager\FormFields\PolymorphicFormField;
//use App\Voyager\Controllers\CoordinateController;
use App\Voyager\FormFields\DateRangeFormField;
use App\Voyager\FormFields\FileChunkFormField;
use App\Voyager\FormFields\PositionFormField;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use MonstreX\VoyagerExtension\Controllers\VoyagerExtensionBaseController;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            VoyagerExtensionBaseController::class,
            \App\Http\Controllers\VoyagerExtension\VoyagerExtensionBaseController::class
        );
        \Voyager::addFormField(PolymorphicFormField::class);
        \Voyager::addFormField(PositionFormField::class);
        Voyager::addFormField(PositionFormField::class);
        Voyager::addFormField(DateRangeFormField::class);
        Voyager::addFormField(FileChunkFormField::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Voyager::addFormField(SelectDependentDropdown::class);
        Paginator::useBootstrap();
    }
}
