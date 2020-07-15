<?php

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
Route::resource('/', 'AdminController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/absensi', 'AbsensiController');
Route::resource('/mahasiswa', 'MahasiswaController');
Route::resource('/absen', 'absenController');
Route::resource('/laporan', 'LaporanController');
// List all alrticle
Route::get('/articles','PostsController@index');

// Export to excel
Route::get('/articles/exportExcel','PostsController@exportExcel');

// Export to csv
Route::get('/articles/exportCSV','PostsController@exportCSV');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');