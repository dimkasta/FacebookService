<?php

namespace Iconic\Facebook;

use Illuminate\Support\ServiceProvider;

class FacebookServiceProvider extends ServiceProvider
{
	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/facebook.php' => config_path('facebook.php'),
			__DIR__.'/button.blade.php' => base_path('resources/views/button.blade.php'),
		]);
	}

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
	    include __DIR__.'/routes.php';
        $this->app->bind('facebook', 'Iconic\Facebook\FacebookClient');
    }
}
