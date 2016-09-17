<?php

namespace Iconic\Facebook\Facades;

use Illuminate\Support\Facades\Facade;

class FacebookClient extends Facade
{
	protected static function getFacadeAccessor() {
		return 'facebook';
	}
}