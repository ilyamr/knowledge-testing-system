<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    /*
     * Dashboard section
     */
    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth.dashboard'], function() {
        Route::get('/', 'Dashboard\HomeController@index');

        /*
        | Topic routes
        |----------------------
        | RESTfull for Topic
        */
        Route::get('topics', 'Dashboard\TopicController@topics');
        Route::match(['get', 'post'], 'topics/{id}/description', 'Dashboard\TopicController@description');
        Route::match(['get', 'post'], 'topics/{id}/edit', 'Dashboard\TopicController@edit')->name('edit-topic');
        Route::match(['get', 'post'], 'topic/new', 'Dashboard\TopicController@create')->name('new-topic');
        Route::get('topics/{id}/delete', 'Dashboard\TopicController@delete');

        /*
         * JSON questions
         */
        Route::get('topics/{id}/data', 'Dashboard\TopicController@data');

        /*
        | User routes
        |
        */
        Route::get('users', 'Dashboard\UserController@users');
        Route::match(['get', 'post'], 'users/{id}/edit', 'Dashboard\UserController@edit');
        Route::get('users/{id}/delete', 'Dashboard\UserController@delete');

    });
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index');

    Route::get('/{id}', 'HomeController@page');

    Route::match(['get', 'post'], '/{id}/tests', 'HomeController@tests')->middleware('auth');
    Route::match(['get', 'post'], '/{id}/tests/results', 'HomeController@results');

    /*
     * Attachments handling
     */
    Route::group(['prefix' => 'attachment'], function(){
        Route::post('upload', 'AttachmentController@upload');
    });
});
