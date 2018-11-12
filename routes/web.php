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

Route::get('/', function () {
   return view('welcome');
});


Route::prefix('api')->group(function() {
	Route::resource('affiliations', 'AffiliationController');
	Route::resource('festivals', 'FestivalController');	
	Route::resource('disciplines', 'DisciplineController');
	Route::resource('venues', 'VenueController');
	Route::resource('eventcategories', 'EventCategoryController');	
	Route::resource('events', 'EventController');
	Route::resource('camp-categories', 'CampCategoryController');
    Route::resource('camps', 'CampController');
    Route::resource('groups', 'GroupController');
    Route::resource('users', 'UserController');
});


Route::get('/{any}', function() {
	return view('welcome');
})->where('any', '.*');
