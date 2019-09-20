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
    return redirect('/select-project');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/select-project');
});
Route::get('/home/{data}', 'HomeController@index')->name('home');
Route::get('/select-project', 'SelectProject@index')->name('select-project');
Route::resource('enterprise', 'EnterPriseController');

/* *สามารถกำหนดใช้เฉพาะบาง Action ใน Routes ได้ เช่น
    Route::resource('blogs', 'BlogController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('blogs', 'BlogController', ['except' => [
        'create', 'store', 'update', 'destroy'
    ]]);
*/
