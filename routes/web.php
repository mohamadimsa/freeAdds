<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Verification Email
Auth::routes(['verify' => true]);


// MiddleWare Auth ( If not connected and not verified)
Route::middleware(['auth', 'verified'])->group(function() {

	// Home
	Route::get('/', 'HomeController@index')->name('home');
	
	// Annonce Resource
	Route::resource("annonce", "AdsController", ["parameters" => [
		'annonce' => 'id'
	]]);
	// Annonce Custom
	Route::get("/annonce/my-ads", "AdsController@myAds")
		->name('annonce.myads');
	Route::get("/annonce/search/{keyword}", "AdsController@searchResult");
	Route::post("/annonce/search", "AdsController@search")
		->name('annonce.search');
		
	// User Resource
	Route::resource("user", "UsersController", ["parameters" => [
		'user' => 'id'
	]]);
	Route::get('/user/edit', "UsersController@edit")->name('user.edit');

	// Message Resource
	Route::resource("message", "MessagesController", ["parameters" => [
			'message' => 'id'
		]]);
	Route::post("/message/create", "MessagesController@create")->name('message.create');
});
Auth::routes();