<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', 'HomeController@index');


//Ruta del Welcome
Route::get('/',[
	'as' => 'welcome.index',
	'uses' => 'WelcomeController@index'

]);

Route::get('categories/{name}',[
	'uses'=>'WelcomeController@searchCategory',
	'as'=>'welcome.searchCategory'
]);

Route::get('tags/{name}',[
	'uses'=>'WelcomeController@searchTag',
	'as'=>'welcome.searchTag'
]);

Route::get('articles/{slug}',[
	'uses'=>'WelcomeController@viewArticle',
	'as'=>'welcome.viewArticle'
]);

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){

	Route::group(['middleware'=>'is_member'], function(){

			Route::resource('users','UsersController');
			Route::get('users/{id}/destroy',[
			'uses'=>'UsersController@destroy',
			'as'=>'users.destroy'
		]);
	});

	Route::resource('categories', 'CategoriesController');
	Route::get('categories/{id}/destroy',[
		 'uses'=>'CategoriesController@destroy',
		 'as'=>'categories.destroy'
	]);

	Route::resource('tags', 'TagsController');
	Route::get('tags/{id}/destroy',[
		 'uses'=>'TagsController@destroy',
		 'as'=>'tags.destroy'
	]);

	Route::resource('articles', 'ArticlesController');
	Route::get('articles/{id}/destroy',[
		 'uses'=>'ArticlesController@destroy',
		 'as'=>'articles.destroy'
	]);

	Route::get('images',[
		'uses'=>'ImagesController@index',
		'as'=>'images.index'
	]);


});
Auth::routes();

Route::get('/home', 'HomeController@index');
