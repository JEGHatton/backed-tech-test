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
Route::get('blog/{blog_id}','BlogController@getPostsAndComments');
Route::post('blog/{blog_id}/{comments_id}','BlogController@createComment');
Route::put('blog/edit','BlogController@editComment');
Route::delete('blog/delete','BlogController@deleteComment');

