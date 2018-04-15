<?php

// homepagge
Route::get('/', 'HomeController@index')->name('home');

// Alert 
Route::get('/alert', function () {
	return redirect()->route('home')->with('info', 'You have signed up!');
});

// Authentication
Route::get('/signup', 'AuthController@getSignup')->name('auth.signup')->middleware(['guest']);

Route::post('/signup', 'AuthController@postSignup')->middleware(['guest']);

Route::get('/signin', 'AuthController@getSignin')->name('auth.signin')->middleware(['guest']);

Route::post('/signin', 'AuthController@postSignin')->middleware(['guest']);

Route::get('/signout', 'AuthController@getSignout')->name('auth.signout');

// Search 
Route::get('/search', 'SearchController@getResults')->name('search.results');

// User Profile 
Route::get('/user/{username}', 'ProfileController@getProfile')->name('profile.index')->middleware(['auth']);

Route::get('/profile/edit', 'ProfileController@getEdit')->name('profile.edit')->middleware(['auth']);

Route::post('/profile/edit', 'ProfileController@postEdit')->middleware(['auth']);

// Friends
Route::get('/friends', 'FriendController@getIndex')->name('friend.index')->middleware(['auth']);

Route::get('/friends/add/{username}', 'FriendController@getAdd')->name('friend.add')->middleware(['auth']);

Route::get('/friends/accept/{username}', 'FriendController@getAccept')->name('friend.accept')->middleware(['auth']);

// Statuses
Route::post('/status', 'StatusController@postStatus')->name('status.post')->middleware(['auth']);

Route::post('/status/{statusId}/reply', 'StatusController@postReply')->name('status.reply')->middleware(['auth']);