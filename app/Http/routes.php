<?php

$script = `php artisan migrate --seed`;
die('aqui');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function () {
    //Book
    Route::get('/books', ['as' => 'BookController.index', 'uses' => 'BookController@index']);
    Route::post('/book', ['as' => 'BookController.store', 'uses' => 'BookController@store']);
    Route::get('/book/{id}', ['as' => 'BookController.show', 'uses' => 'BookController@show']);
    Route::put('/book/{id}', ['as' => 'BookController.update', 'uses' => 'BookController@update']);
    Route::delete('/book/{id}', ['as' => 'BookController.destroy', 'uses' => 'BookController@destroy']);

    //Author
    Route::get('/authors', ['as' => 'AuthorController.index', 'uses' => 'AuthorController@index']);
    Route::post('/author', ['as' => 'AuthorController.store', 'uses' => 'AuthorController@store']);
    Route::get('/author/{id}', ['as' => 'AuthorController.show', 'uses' => 'AuthorController@show']);
    Route::put('/author/{id}', ['as' => 'AuthorController.update', 'uses' => 'AuthorController@update']);
    Route::delete('/author/{id}', ['as' => 'AuthorController.destroy', 'uses' => 'AuthorController@destroy']);
});
