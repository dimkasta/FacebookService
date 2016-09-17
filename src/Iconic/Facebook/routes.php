<?php
Route::group(['middleware' => ['web']], function () {
	Route::get(config('facebook.login_callback_url'), 'Iconic\Facebook\FacebookServiceController@loginCallback')->name('facebookCallback');
	Route::get(config('facebook.login-url'), 'Iconic\Facebook\FacebookServiceController@login')->name('facebookLogin');
	Route::get(config('facebook.logout_success_url'), 'Iconic\Facebook\FacebookServiceController@logoutSuccess')->name('facebookLogoutSuccess');
});
