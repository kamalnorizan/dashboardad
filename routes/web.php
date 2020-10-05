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

// DB::listen(function ($event) {
//     dump($event->sql);
// });

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

// User
Route::get('user/getOrg/{id}', 'UserController@getOrg');
Route::get('user/getOrg/{id}/{negeri}', 'UserController@getOrgNegeri');
Route::get('/user/revokeuserrole/{role}/{user}', 'UserController@revokeuserrole')->name('user.revokeuserrole');
Route::resource('user', 'UserController')->middleware(['auth','permission: show user|edit user']);

// Organisasi
Route::resource('organisasi', 'OrganisasiController')->middleware('auth');

// Jawatan
Route::resource('jawatan', 'JawatanController')->middleware('auth');

//Permission
Route::get('/permission', 'PermissionController@index')->name('permission.index');
Route::post('/permission/storepermission', 'PermissionController@storepermission')->name('permission.storepermission');
Route::post('/permission/storerole', 'PermissionController@storerole')->name('permission.storerole');
Route::get('/permission/assignpermissiontorole/{role}/{permission}', 'PermissionController@assignpermissiontorole')->name('permission.assignpermissiontorole');
Route::get('/permission/revokepermissionfromrole/{role}/{permission}', 'PermissionController@revokepermissionfromrole')->name('permission.revokepermissionfromrole');
Route::post('/permission/beripermissiontorole', 'PermissionController@beripermissiontorole')->name('permission.beripermissiontorole');
Route::get('/permission/checkpermission/{role}', 'PermissionController@checkpermission')->name('permission.checkpermission');
Route::get('/permission/resetrolepermissions/{role}', 'PermissionController@resetrolepermissions')->name('permission.resetrolepermissions');
Route::post('/permission/assignrole', 'PermissionController@assignrole')->name('user.assignrole');


// laporan
Route::get('/laporan/getSubkategori/{kategori}', 'LaporanController@getSubkategori')->name('laporan.getSubkategori');
Route::get('/laporan/getJawatankuasa', 'LaporanController@getJawatankuasa')->name('laporan.getJawatankuasa');
Route::get('/laporan/ajaxlaporan', 'LaporanController@ajaxlaporan')->name('laporan.ajaxlaporan');
Route::get('/laporan', 'LaporanController@index')->name('laporan.index');
Route::get('/laporan/create', 'LaporanController@create')->name('laporan.create');
Route::post('/laporan', 'LaporanController@store')->name('laporan.store');


//penemuan
Route::get('/penemuan/index/{laporan}', 'PenemuanController@index')->name('penemuan.index');
Route::get('/penemuan/ajaxpenemuan/{laporan}', 'PenemuanController@ajaxpenemuan')->name('penemuan.ajaxpenemuan');
Route::post('/penemuan', 'PenemuanController@store')->name('penemuan.store');
Route::get('/penemuan/getorganisasi', 'PenemuanController@getorganisasi')->name('penemuan.getorganisasi');
Route::get('/penemuan/{penemuan}/edit', 'PenemuanController@edit')->name('penemuan.edit');
Route::put('/penemuan/{penemuan}', 'PenemuanController@update')->name('penemuan.update');
Route::get('/penemuan/{penemuan}', 'PenemuanController@show')->name('penemuan.show');
Route::get('/penemuan/{penemuan}/delete', 'PenemuanController@destroy')->name('penemuan.destroy');
Route::get('/penemuan/getpegawai/{organisasi}', 'PenemuanController@getpegawai')->name('penemuan.getpegawai');
// Route::get('summernote-image-upload','PenemuanController@index')->name('penemuan.index');
// Route::post('post-summernote-image-upload','PenemuanController@store')->name('penemuan.store');

// Jawatankuasa
Route::resource('jawatankuasa', 'JawatankuasaController')->middleware('auth');
Route::get('/jawatankuasa/create/{laporan}', 'JawatankuasaController@create')->name('jawatankuasa.create');
Route::post('/jawatankuasa', 'JawatankuasaController@store')->name('jawatankuasa.store');

// KCAD
Route::resource('kcad', 'UlasanpenemuanController')->middleware('auth');
Route::get('/kcad/create/{laporan}', 'UlasanpenemuanController@create')->name('kcad.create');
Route::post('/kcad', 'UlasanpenemuanController@store')->name('kcad.store');

// maklumbalas
Route::resource('maklumbalas', 'MaklumbalasController')->middleware('auth');
Route::get('/maklumbalas/create/{laporan}', 'MaklumbalasController@create')->name('maklumbalas.create');
Route::post('/maklumbalas', 'MaklumbalasController@store')->name('maklumbalas.store');
