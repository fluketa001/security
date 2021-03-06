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
    return redirect('/home');
});

Auth::routes();

/*Route::get('/home', function () {
    return redirect('/home/{data}');
});*/
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/enterprise/{data}', 'EnterPriseController@update_post');

Route::get('/add', function () {
    return view('enterprises.add_enterprise');
});
Route::get('/resident/create/{id}', 'ResidentController@create');
Route::get('/select-enterprise', 'ResidentController@index')->name('select-enterprise');

Route::resource('enterprise', 'EnterPriseController');
Route::resource('detail_user', 'DetailUserController');
Route::resource('user', 'UserController');
Route::resource('resident', 'ResidentController');
Route::resource('inout', 'InOutController');

Route::get('/enterprise/delete/{data}', 'EnterPriseController@destroy');
Route::get('/user/delete/{data}', 'UserController@destroy');
Route::get('/resident/delete/{data}', 'ResidentController@destroy');
//Route::get('/user/{data}', 'UserController@update');

View::composer(['*'], function ($view) {
    $user = Auth::user();
    $view->with('user',$user);
});

/* *สามารถกำหนดใช้เฉพาะบาง Action ใน Routes ได้ เช่น
    Route::resource('blogs', 'BlogController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('blogs', 'BlogController', ['except' => [
        'create', 'store', 'update', 'destroy'
    ]]);
*/
