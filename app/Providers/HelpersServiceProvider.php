<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('helpers', function()
        {
            return new \App\Helpers;
        });
    }

}