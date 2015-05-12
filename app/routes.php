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

Route::get('/', function () {
    return View::make('hello');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::controller('categories', 'CategoriesController',
        [
            'getIndex' => 'admin.categories.index',
            'getView' => 'admin.categories.view'
        ]
    );

    Route::controller('nations', 'NationsController', [
        'getIndex' => 'admin.nations.index',
        'getView' => 'admin.nations.view'
    ]);
});


Route::group(['namespace' => 'Frontend'], function () {
    Route::get('episode/{id}/{slug}', ['as' => 'frontend.episodes.view', 'uses' => 'EpisodesController@getView']);
});
