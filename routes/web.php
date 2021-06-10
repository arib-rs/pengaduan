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

// Route::auth();

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::get('/', function () {
    return view('layout/landing');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resources([
        'bidang' => 'ScopesController',
        'media' => 'MediaController',
        'pekerjaan' => 'JobsController',
        'opd' => 'UnitsController',
        'user' => 'UsersController',
        'pengaduan' => 'ComplaintsController',
    ]);
    Route::get('get-scopes', 'ScopesController@getScopes')->name('get-scopes');
    Route::get('get-media', 'MediaController@getMedia')->name('get-media');
    Route::get('get-jobs', 'JobsController@getJobs')->name('get-jobs');  
    Route::get('get-opds', 'UnitsController@getOpds')->name('get-opds');
    Route::get('get-tingkats', 'UnitsController@getTingkats')->name('get-tingkats');
    Route::get('get-tingkats-opds', 'UsersController@getTingkatsOpds')->name('get-tingkats-opds');
    Route::get('get-users', 'UsersController@getUsers')->name('get-users');
    Route::put('resetPassword/{id?}', 'UsersController@resetPassword')->name('resetPassword');
    Route::get('get-pengaduans-bymonth/{tahun?}/{bulan?}', 'ComplaintsController@getPengaduansByMonth')->name('get-pengaduans-bymonth');
    Route::get('get-progresses/{id?}', 'ComplaintsController@getProgresses')->name('get-progresses');
    Route::get('get-responses/{id?}', 'ComplaintsController@getResponses')->name('get-responses');
    Route::post('validasi', 'ComplaintsController@validasi');
    Route::post('kembalikan-save', 'ComplaintsController@kembalikanSave');
    Route::post('klasifikasi', 'ComplaintsController@storeKlasifikasi')->name('klasifikasi');
    Route::post('respon', 'ComplaintsController@storeRespon')->name('respon');
});
