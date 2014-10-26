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

Route::group(array('prefix' => 'api/v1'), function()
{
	//Route::resource('photos.comments', 'PhotoCommentController');
	Route::resource('photos', 'PhotoController');
	Route::resource('comments', 'CommentController');
	
});

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/docs/branding-api/v1', function()
{
	return View::make('apis/docs/home');
});
	Route::get('/docs/branding-api/v1/using-branding-api', function()
	{
		return View::make('apis/docs/using-branding-api');
	});
	Route::get('/docs/branding-api/v1/reference', function()
	{
		return View::make('apis/docs/reference');
	});
		Route::get('/docs/branding-api/v1/reference/cars', function()
		{
			return View::make('apis/docs/cars/index');
		});
		Route::get('/docs/branding-api/v1/reference/cars/:id', function()
		{
			return View::make('apis/docs/cars/show');
		});
		Route::get('/docs/branding-api/v1/reference/makers', function()
		{
			return View::make('apis/docs/makers/index');
		});
	Route::get('/docs/branding-api/v1/changelog', function()
	{
		return View::make('apis/docs/changelog');
	});



