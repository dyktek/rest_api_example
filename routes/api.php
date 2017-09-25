<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/posts', 'PostsController');

Route::group([
    'middleware' => ['auth.jwt']
], function () {
    Route::resource('/categories', 'CategoriesController');
});


Route::get('/posts/{category_id}/category', [
    'uses' => 'PostsController@getPostsByCategory',
    'as' => 'posts.getPostsByCategory'
]);


Route::post('/user/signin', [
    'uses' => 'UserController@signin',
    'as' => 'user.signin'
]);

Route::get('/user/logout', [
    'uses' => 'UserController@logout',
    'as' => 'user.logout'
]);