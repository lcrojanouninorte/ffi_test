<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         View::composer('layouts.master', 'App\Http\ViewComposers\ProfileComposer');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        

    }
}
