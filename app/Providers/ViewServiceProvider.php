<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(
            'site.layouts.app', 'App\Http\View\Composers\CommonComposer'
        );
        View::composer(
            'site.*', 'App\Http\View\Composers\PageComposer'
        );
    }
}
