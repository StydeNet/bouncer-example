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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'PostController@index')->name('posts.index');
    Route::post('/posts/{post}/comments', 'CommentController@store')->name('comments.store');

    Route::group(['middleware' => 'can:create,App\Post'], function () {
        Route::get('/posts/create', 'PostController@create')->name('posts.create');
        Route::post('/posts', 'PostController@store')->name('posts.store');
    });

    Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
});

Route::get('posts/{post}', 'PostController@show')->name('posts.show');
