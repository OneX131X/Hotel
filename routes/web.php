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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

// routing baru

Route::resource('pengguna', 'UserController')->middleware('auth');
Route::get('cetak-pengguna', 'UserController@print')->name('pengguna.cetak');

Route::resource('kamar', 'KamarController')->middleware('auth');
Route::get('cetak-kamar', 'KamarController@cetakKamar')->name('kamar.cetak');

Route::resource('pengunjung', 'PengunjungController')->middleware('auth');
Route::get('cetak-pengunjung', 'PengunjungController@cetakPengunjung')->name('pengunjung.cetak');

Route::resource('transaksi', 'TransaksiController')->middleware('auth');
Route::get('cetak-transaksi', 'TransaksiController@cetakTransaksi')->name('transaksi.cetak');
