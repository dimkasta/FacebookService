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
//dd($url);
		if(\Facebook::isUserAuthenticated()) {
			$user = \Facebook::get("/me")->getGraphUser();

//			dd($user);
		}
//
		return view('facebook.button')->with(compact('url', 'user'));

    }

	/**
	 * Login Callback
	 *
	 * @return null
	 */
	public function loginCallback()
	{
		try {
			\Facebook::receiveUserAccessToken();
		}
		catch (FacebookSDKException $e) {
//			return redirect(config('facebook.login-url'));
		}
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
		return redirect('facebook-login');
    }
}
