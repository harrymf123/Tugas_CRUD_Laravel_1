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
    return view('welcome');
});

////////////////////////////////////////////

/*
Route::get('/', function() {
    return view('pages.homepage');
});
*/

Route::get('homepage', 'pagescontroller@homepage');

Route::get('form', 'formcontroller@registrasi');

/*
Route::get('about', function() {
    return view('pages.about');
});
*/

Route::get('about', 'pagescontroller@about');

/*
Route::get('siswa', function() {
    $siswa = ['Andi','Budi','Harry','Galih','Vieri'];
    return view('siswa.index', ['siswa' => $siswa]);
});
*/

// Siswa

Route::get('siswa', 'siswacontroller@siswa');

Route::get('template', 'templatecontroller@template');

// Siswa Model

Route::get('tempalate', 'templatecontroller@tempalate');

Route::get('siswamodel', 'siswacontroller@siswamodel');

Route::get('siswamodel/cetak_pdf', 'siswacontroller@cetak_pdf');

Route::get('siswamodel/cetak_excel', 'siswacontroller@cetak_excel');

Route::get('createsiswa', 'siswacontroller@create');

Route::post('simpansiswa', 'siswacontroller@store');

Route::get('detailsiswa{siswa}','siswacontroller@show');

Route::get('editsiswa{siswa}', 'siswacontroller@edit');

Route::post('updatesiswa{siswa}', 'siswacontroller@update');

Route::get('deletesiswa{siswa}', 'siswacontroller@delete');

// Sistem Athenthification

Route::get('login', 'loginregistercontroller@login');

Route::post('masuk', 'loginregistercontroller@masuk');

Route::get('register', 'loginregistercontroller@registrasi');

Route::post('adduser', 'loginregistercontroller@adduser');

Route::get('logout', 'loginregistercontroller@logout');

// Guru Model

Route::get('gurumodel','gurucontroller@gurumodel');

Route::get('gurumodel/cetak_pdf','gurucontroller@cetak_pdf');

Route::get('gurumodel/cetak_excel','gurucontroller@cetak_excel');

Route::get('createguru', 'gurucontroller@create');

Route::post('simpanguru', 'gurucontroller@store');

Route::get('detailguru{guru}','gurucontroller@show');

Route::get('editguru{guru}', 'gurucontroller@edit');

Route::post('updateguru{guru}', 'gurucontroller@update');

Route::get('deleteguru{guru}', 'gurucontroller@delete');

// Kelas Model

Route::get('kelasmodel','kelascontroller@kelasmodel');

Route::get('kelasmodel/cetak_pdf','kelascontroller@cetak_pdf');

Route::get('kelasmodel/cetak_excel','kelascontroller@cetak_excel');

Route::get('createkelas', 'kelascontroller@create');

Route::post('simpankelas', 'kelascontroller@store');

Route::get('detailkelas{kelas}','kelascontroller@show');

Route::get('editkelas{kelas}', 'kelascontroller@edit');

Route::post('updatekelas{kelas}', 'kelascontroller@update');

Route::get('deletekelas{kelas}', 'kelascontroller@delete');

// Walikelas Model

Route::get('walikelasmodel','walikelascontroller@walikelasmodel');

Route::get('walikelasmodel/cetak_pdf','walikelascontroller@cetak_pdf');

Route::get('walikelasmodel/cetak_excel','walikelascontroller@cetak_excel');

Route::get('createwalikelas', 'walikelascontroller@create');

Route::post('simpanwalikelas', 'walikelascontroller@store');

Route::get('detailwalikelas{walikelas}','walikelascontroller@show');

Route::get('editwalikelas{walikelas}', 'walikelascontroller@edit');

Route::post('updatewalikelas{walikelas}', 'walikelascontroller@update');

Route::get('deletewalikelas{walikelas}', 'walikelascontroller@delete');