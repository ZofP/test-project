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

Route::get('/', function () {
    return redirect()->route('articles');
});

// articles routes
Route::post('/article/store', 'ArticleController@store');
Route::post('/article/update', 'ArticleController@update');
Route::get('/articles/{path?}', 'ArticleController@app')->where('path', '.*')->middleware('auth')->name('articles');
