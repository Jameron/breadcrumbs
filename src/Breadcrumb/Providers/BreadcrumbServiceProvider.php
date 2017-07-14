<?php

namespace Jameron\Breadcrumb\Providers;

use Jameron\Breadcrumb\Breadcrumb;

use Illuminate\Support\ServiceProvider;

class BreadcrumbServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->singleton(Breadcrumb::class, function ($app)
		{
            return new Breadcrumb();
		});
    }
}
