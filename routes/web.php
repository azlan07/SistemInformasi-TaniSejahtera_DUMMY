<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\IuranBulananController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JadwalGarapController;
use App\Http\Controllers\PotongRumputController;
use App\Http\Controllers\SawahController;
use App\Http\Controllers\TraktorController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', Frontend::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('sawah', SawahController::class);
Route::resource('iuran_bulanan', IuranBulananController::class);
Route::resource('jabatan', JabatanController::class);
Route::resource('jadwal_garap', JadwalGarapController::class);
Route::resource('traktor', TraktorController::class);
Route::resource('potong_rumput', PotongRumputController::class);
Route::get('/printTraktor', [App\Http\Controllers\TraktorController::class, 'print']);
Route::get('/printPotongR', [App\Http\Controllers\PotongRumputController::class, 'print']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

