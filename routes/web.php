<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get("/top", "App\Http\Controllers\BrogController@Home")->middleware('auth');
Route::get("/thread/{id}", "App\Http\Controllers\BrogController@detail")->middleware('auth');
Route::get("/create", "App\Http\Controllers\BrogController@create")->middleware('auth');
Route::post("/threadCreating", "App\Http\Controllers\BrogController@creating")->middleware('auth');
Route::get("/blog/delete/{id}", "App\Http\Controllers\BrogController@delete")->middleware('auth');
Route::get("/blog/edit/{id}", "App\Http\Controllers\BrogController@edit")->middleware('auth');
Route::post("/blog/update/{id}", "App\Http\Controllers\BrogController@update")->middleware('auth');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post("/comment", "App\Http\Controllers\BrogController@comment")->middleware('auth');
Route::get("/", "App\Http\Controllers\BrogController@open")->name('open');
Route::get('/done', "App\Http\Controllers\BrogController@done")->middleware('auth');
Route::get('/user-page', "App\Http\Controllers\BrogController@userpage")->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
