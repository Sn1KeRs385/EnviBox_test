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
})->name('IndexPage');

Route::get('/Feedback', 'FeedbackController@index')->name('Feedback.index');

Route::post('/Feedback/Add', 'FeedbackController@Add')->name('Feedback.Add');

