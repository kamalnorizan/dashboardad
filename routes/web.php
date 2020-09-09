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
Route::resource('user', 'UserController')->middleware('auth');

// Organisasi
Route::resource('organisasi', 'OrganisasiController')->middleware('auth');

//Permission
Route::get('/permission', 'PermissionController@index')->name('permission.index');
Route::post('/permission/storepermission', 'PermissionController@storepermission')->name('permission.storepermission');
Route::post('/permission/storerole', 'PermissionController@storerole')->name('permission.storerole');
Route::get('/permission/assignpermissiontorole/{role}/{permission}', 'PermissionController@assignpermissiontorole')->name('permission.assignpermissiontorole');
Route::get('/permission/revokepermissionfromrole/{role}/{permission}', 'PermissionController@revokepermissionfromrole')->name('permission.revokepermissionfromrole');
Route::post('/permission/beripermissiontorole', 'PermissionController@beripermissiontorole')->name('permission.beripermissiontorole');
Route::get('/permission/checkpermission/{role}', 'PermissionController@checkpermission')->name('permission.checkpermission');
Route::get('/permission/resetrolepermissions/{role}', 'PermissionController@resetrolepermissions')->name('permission.resetrolepermissions');

