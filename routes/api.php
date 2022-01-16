<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// articles routes
Route::post('articles', 'api\ArticleController@create');
Route::put('articles/{articleId}', 'api\ArticleController@update');

Route::get('articles/{articleId}', 'api\ArticleController@show');
Route::get('articles', 'api\ArticleController@index');

Route::get('/user', 'api\UserController@getUserId');
