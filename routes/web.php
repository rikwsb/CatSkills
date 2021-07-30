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
Auth::routes();

//OPINIONS
Route::resource('opinions', App\Http\Controllers\OpinionController::class);

Route::get('/', [App\Http\Controllers\EventController::class, 'home'])->name('home');
Route::get('/home', [App\Http\Controllers\EventController::class, 'home'])->name('home');
Route::get('/home/{event}', [App\Http\Controllers\EventController::class, 'search']);

//AJAX
Route::get('ajax-request', 'AjaxController@create');
Route::post('ajax-request', 'AjaxController@store');

//USERS
//Route::patch('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::resource('users', App\Http\Controllers\UserController::class);

//Route::group(['middleware' => ['auth', 'admin']], function() {
//
//});

//EVENTS
Route::resource('events', App\Http\Controllers\EventController::class);
//Route::get('/event/index', [App\Http\Controllers\EventController::class, 'index']);
//Route::get('/event/create', [App\Http\Controllers\EventController::class, 'create']);
//Route::post('/event/store', [App\Http\Controllers\EventController::class, 'store']);
//Route::get('/event/{event}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('event.edit');
//Route::patch('/event/{event}', [App\Http\Controllers\EventController::class, 'update'])->name('event.update');
//Route::get('/event/{event}', [App\Http\Controllers\EventController::class, 'show']);

//PLACES
Route::resource('places', App\Http\Controllers\PlaceController::class);
//Route::get('/place/index', 'PlaceController@index')->name('place.index');
//Route::get('/place/create', [App\Http\Controllers\PlaceController::class, 'create']);
//Route::post('/place/store', [App\Http\Controllers\PlaceController::class, 'store']);
//Route::get('/place/{place}/edit', [App\Http\Controllers\PlaceController::class, 'edit'])->name('place.edit');
//Route::patch('/place/{place}', [App\Http\Controllers\PlaceController::class, 'update'])->name('place.update');

//BOOKING
Route::resource('booking', App\Http\Controllers\BookingController::class);
//Route::get('/booking/{booking}', [App\Http\Controllers\BookingController::class, 'show']);
//Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index']);
