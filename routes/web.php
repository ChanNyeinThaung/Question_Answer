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

Route::get('/','QuestionController@index');

Auth::routes();

Route::get('/home', 'QuestionController@index')->name('home');

Route::get('/questions', 'QuestionController@index');
Route::get('/questions/view/{id}', 'QuestionController@view');

Route::get('/questions/add', 'QuestionController@add');
Route::post('/questions/add', 'QuestionController@create');
Route::get('/questions/up/{id}', 'QuestionController@up');
Route::get('/questions/down/{id}', 'QuestionController@down');

Route::post('/answers/add', 'QuestionController@addAnswer');

Route::get('/questions/sort/{type}', 'QuestionController@index');


