<?php

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

Route::group(['middleware' => ['cors']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('api/poll', 'PollsController');
    Route::resource('api/polloption', 'PollOptionsController');
    Route::get('api/polloption/addvote/{id}', 'PollOptionsController@addVote');

});
