<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		//
        view()->composer('layout.sidebar', function ($view) {
            $view->with('main_categories', \App\Category::main());
		});
		view()->composer('admin.artwork.item', function ($view) {
            $view->with('main_categories', \App\Category::main());
		});
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
