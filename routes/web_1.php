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
Route::get('/', 'Page@index');
//------ Route for Logowanias ------
Route::get('/logowanias/destroy/{id}', 'Logowanias@destroy')->name('destroy-logowania');
Route::get('/logowanias/ajaxField ', 'logowanias@ajaxField')->name('ajaxField');
Route::get('/logowanias/select2_ajax ', 'logowanias@select2_ajax')->name('select2_ajax');
Route::get('/logowanias/getOne ', 'logowanias@getOne')->name('getOne');

Route::resource('logowanias', logowanias::class);

//------ Route for trainers ------
Route::get('/trainers', 'trainers@index');
Route::post('/trainers/imageAjax', 'Trainers@imageAjax')->name('imageAjax');
Route::get('/trainers/imageLoad', 'Trainers@imageLoad')->name('imageLoad');
Route::get('/trainers/select2', 'Trainers@select2')->name('select2');
Route::get('/trainers/select2_ajax', 'Trainers@select2_ajax')->name('select2_ajax');
Route::get('/trainers/val', 'Trainers@val')->name('val');

//------ Route for Players ------
Route::get('/players/destroy/{id}', 'Players@destroy')->name('destroy-player');
Route::get('/players/ajaxField ', 'players@ajaxField')->name('ajaxField');

Route::resource('players', players::class);

//------ Route for Users ------
Route::get('/users/destroy/{id}', 'Users@destroy')->name('destroy-user');
Route::get('/users/ajaxField ', 'users@ajaxField')->name('ajaxField');

Route::resource('users', users::class);
