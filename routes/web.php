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

DB::listen(function ($event) {
    dump($event->sql);
});

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user/getOrg/{id}', 'UserController@getOrg');
Route::get('user/getOrg/{id}/{negeri}', 'UserController@getOrgNegeri');
Route::resource('user', 'UserController')->middleware('auth');
