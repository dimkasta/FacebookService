<?php

Route::get('facebook-callback', 'FacebookServiceController@loginCallback')->name('facebookCallback');
Route::get('facebook-login', 'FacebookServiceController@login')->name('facebookLogin');
Route::get('facebook-logout-success', 'FacebookServiceController@logoutSuccess')->name('facebookLogoutSuccess');