<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidatiorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->extend('numericarray', function ($attribute, $value, $parameters)
        {
                if ($value=='india') {
                    return true;
                }else{
                    return false;
                }

        });

        $this->app['validator']->extend('statename', function ($attribute, $value, $parameters)
        {
            if ($value=='gujarat') {
                return true;
            }else{
                return false;
            }

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
