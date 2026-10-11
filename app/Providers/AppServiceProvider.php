<?php

namespace App\Providers;

use App\Models\FirmSetting;
use App\Models\PracticeArea;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        try {
            if (Schema::hasTable('firm_settings')) {
                View::composer('*', function ($view) {
                    $view->with('settings', FirmSetting::pluck('value', 'key')->all());
                });
            }

            if (Schema::hasTable('practice_areas')) {
                View::composer('*', function ($view) {
                    $view->with('globalPracticeAreas', PracticeArea::active()->get());
                });
            }
        } catch (\Throwable $e) {
            // Ignore during migrations or initial bootstrap
        }
    }
}
