<?php

namespace Iconic\Facades;

use Illuminate\Support\Facades\Facade;

class FacebookClient extends Facade
{
	protected static function getFacadeAccessor() {
		return 'facebook';
	}
}