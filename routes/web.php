<?php

use Illuminate\Support\Facades\Route;

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

Route::get("/top", "App\Http\Controllers\BrogController@Home");
Route::get("/blog/{id}", "App\Http\Controllers\BrogController@detail");
Route::get("/create", "App\Http\Controllers\BrogController@create");
Route::post("/blog/creating", "App\Http\Controllers\BrogController@creating");
Route::get("/blog/delete/{id}", "App\Http\Controllers\BrogController@delete");
Route::get("/blog/edit/{id}", "App\Http\Controllers\BrogController@edit");
Route::post("/blog/update/{id}", "App\Http\Controllers\BrogController@update");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
