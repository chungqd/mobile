<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Brands;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // view()->composer('layouts.header', function($view) {
        //     $brandsProduct = Brands::all();
        //     $view->with('brandsProduct', $brandsProduct);
        // });
        // 
        // c2
        $brandsProduct = Brands::all();
        view()->share('brandsProduct', $brandsProduct);
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
