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
Auth::routes();

// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::get('/', function () {
    return view('layout/landing');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pengaduan', [PengaduanController::class, 'index']);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/daftar_pengaduan', function () {
    return view('pengaduan.daftar_pengaduan');
});
Route::get('/form_pengaduan', function () {
    return view('pengaduan.form_pengaduan');
});

Route::get('/user', 'UsersController@index');

// Route::get('/opd', );
// Route::get('/bidang', );
// Route::get('/media', );
// Route::get('/pekerjaan', );
