<?php

namespace Iconic\Facebook;


use Facebook\FacebookResponse;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class FacebookServiceController extends Controller
{
	/**
	 * Login
	 *
	 *
	 * @return null
	 */
	public function login()
	{
		$url = \Facebook::getLoginActionUrl();

		if(\Facebook::isUserAuthenticated()) {
			$user = \Facebook::get("/me")->getGraphUser();
		}
		return view(config('facebook.login-view'))->with(compact('url', 'user'));
    }

	/**
	 * Login Callback
	 *
	 * @return null
	 */
	public function loginCallback(Request $request)
	{
		\Facebook::receiveUserAccessToken($request);
		return redirect(config('facebook.login-url'));
    }

	/**
	 * Logout Success
	 *
	 * @return null
	 */
	public function logoutSuccess(Request $request)
	{
		$request->session()->flush();
		$request->session()->regenerate();
		return redirect(config('facebook.login-url'));
    }
}
