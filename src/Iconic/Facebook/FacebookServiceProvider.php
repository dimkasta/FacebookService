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
