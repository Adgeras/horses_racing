<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/', 'BettersController@index');
    Route::resource('betters', 'BettersController');
    Route::resource('horses', 'HorsesController');
    Route::get('horses/{id}/travel', 'HorsesController@travel')->name('horses.travel');
});



Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');