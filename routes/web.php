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

Route::prefix('user')->middleware(['auth'])->group(function () {

    // 課金
    Route::get('subscription', 'App\Http\Controllers\BrogController@index');
    Route::get('ajax/subscription/status', 'App\Http\Controllers\User\Ajax\SubscriptionController@status');
    Route::post('ajax/subscription/subscribe', 'App\Http\Controllers\User\Ajax\SubscriptionController@subscribe');
    Route::post('ajax/subscription/cancel', 'App\Http\Controllers\User\Ajax\SubscriptionController@cancel');
    Route::post('ajax/subscription/resume', 'App\Http\Controllers\User\Ajax\SubscriptionController@resume');
    Route::post('ajax/subscription/change_plan', 'App\Http\Controllers\User\Ajax\SubscriptionController@change_plan');
    Route::post('ajax/subscription/update_card', 'App\Http\Controllers\User\Ajax\SubscriptionController@update_card');
});
