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

Route::get('/','generalController@index');
Route::get('/registrasi','generalController@index');
Route::any('/regis','generalController@registrasi');
Route::get('/pembayaran','generalController@pembayaran');
Route::any('/bayar','generalController@bayar');
Route::any('/checkNRP','generalController@checkNRP');
Route::get('/absen', 'generalController@absen');
Route::post('/absen/peserta', 'generalController@absenPeserta');

//admin
Route::get('/admin','adminController@index');
Route::any('/login','adminController@login');
Route::get('/aktifkan_sesi/{id}', 'adminController@aktifkan_sesi');
Route::get('/absensi', 'adminController@absensi');
Route::get('/detail-absensi/{id_sesi}', 'adminController@detail_absensi');
Route::middleware('checkAdmin')->group(function () {
    Route::get('/dashboard','adminController@dashboard');
    Route::get('/getMahasiswa','adminController@getMahasiswa');
    Route::get('/getMahasiswaFull','adminController@getMahasiswaFull');
    Route::get('/getBayar','adminController@getBayar');

    Route::get('/verifikasi/{id}','adminController@verifikasi');
    Route::get('/vpembayaran','adminController@vpembayaran');
    Route::get('/peserta','adminController@peserta');
    Route::get('/logout','adminController@logout');

    Route::get('/sesi','adminController@sesi');
    Route::get('/getSesi','adminController@getSesi');
    Route::any('/tambahSesi','adminController@tambahSesi');

    Route::any('/updateTema','adminController@updateTema');
});

