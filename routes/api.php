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
| Please make BLOG & COMMENT CRUD ROUTES
*/

Route::get('blog','BlogController@getPosts');
Route::get('blog','BlogController@getPostsAndComments');
Route::post('blog','BlogController@postComment');
Route::put('blog','BlogController@putComment');
Route::delete('blog','BlogController@deleteComment');

