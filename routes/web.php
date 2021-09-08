<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
Route::get('/success', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post("/comment", "App\Http\Controllers\BrogController@comment")->middleware('auth');
Route::get('/done', "App\Http\Controllers\BrogController@done")->middleware('auth');
Route::get('/user-page', "App\Http\Controllers\User\Ajax\SubscriptionController@userpage")->middleware('auth')->name("userpage");
Route::get('/', "App\Http\Controllers\BrogController@sitetop");
Route::get('/success', "App\Http\Controllers\BrogController@success")->middleware('auth');


Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store']);
Auth::routes();

Route::get('/search', "App\Http\Controllers\BrogController@search")->middleware('auth');

Route::get('/subscription', 'App\Http\Controllers\User\Ajax\SubscriptionController@index')->name('stripe.subscription');
Route::get('/user/payment', 'App\Http\Controllers\User\Ajax\SubscriptionController@getCurrentPayment')->name('user.payment')->middleware('auth');
Route::get('/user/payment/form', 'App\Http\Controllers\User\Ajax\SubscriptionController@getPaymentForm')->name('user.payment.form')->middleware('auth');
Route::post('/user/payment/store', 'App\Http\Controllers\User\Ajax\SubscriptionController@storePaymentInfo')->name('user.payment.store')->middleware('auth');
Route::get('/user/paidpage', 'App\Http\Controllers\User\Ajax\SubscriptionController@paidpage');
Route::post('/delete/card', 'App\Http\Controllers\User\Ajax\SubscriptionController@deletePaymentInfo');
Route::post('/user/paid', 'App\Http\Controllers\User\Ajax\SubscriptionController@becomePaidMember')->name('user.paid');
Route::post('/user/cancel', 'App\Http\Controllers\User\Ajax\SubscriptionController@cancelPaidMember')->name('user.cancel');
Route::post('/icon', "App\Http\Controllers\BrogController@icon")->middleware('auth');
