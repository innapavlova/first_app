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

Route::get('/', function () { return view('auth/login');});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/details/user_bonuses/{id}', ['as' => 'details.user_bonuses', 'uses' => 'App\Http\Controllers\CommunicationController@getUserBonuses']);
    Route::get('/softDeleteUserBonuses/{id}', ['as' => 'softDeleteUserBonuses', 'uses' => 'App\Http\Controllers\CommunicationController@softDeleteUserBonuses']);
});
