<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::group(array('prefix' => 'api'), function()
    {
        Route::resource('user', 'UserController');
        Route::resource('county', 'CountyController');
        Route::resource('city', 'CityController');
        Route::resource('house_type', 'HouseTypeController');
        Route::resource('sales_type', 'SalesTypeController');
        Route::resource('property', 'PropertyController');
    });


