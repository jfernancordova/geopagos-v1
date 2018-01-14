<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);
Route::resource('favorites', 'FavoritesController', ['except' => ['create', 'edit']]);
Route::resource('payments', 'PaymentsController', ['except' => ['create', 'edit']]);
Route::resource('paymentsUsers', 'PaymentsUsersController', ['except' => ['create', 'edit']]);