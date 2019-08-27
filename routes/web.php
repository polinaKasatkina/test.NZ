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

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('index');
});

Route::get('/blog/{url}', 'BlogsController@show');

Route::get('/blogs/all', 'BlogsController@index');
Route::post('/blogs/search', 'BlogsController@searchByTitle');
Route::post('/blogs/order', 'BlogsController@orderByDate');


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'HomeController@index')->name('admin');
    Route::resource('blogs', 'BlogController');

});
