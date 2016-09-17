<?php
Route::group(['middleware' => ['web']], function () {
	Route::get('facebook-callback', 'Iconic\Facebook\FacebookServiceController@loginCallback')->name('facebookCallback');
	Route::get('facebook-login', 'Iconic\Facebook\FacebookServiceController@login')->name('facebookLogin');
	Route::get('facebook-logout-success', 'Iconic\Facebook\FacebookServiceController@logoutSuccess')->name('facebookLogoutSuccess');
});
