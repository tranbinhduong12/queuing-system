<?php

namespace App\Providers;

use App\Models\ticket;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // get 20 records from ticket table
        View::composer('*', function ($view) {
            $records = ticket::orderBy('id', 'desc')->take(20)->get();
            $view->with('notifications', $records);
        });
    }
}
