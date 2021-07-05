<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', "HomeController@index")->name("index");
Route::get('/posts', "PostController@index")->name("posts.index");
Route::get('/posts/{slug}', "PostController@show")->name("posts.show");

Auth::routes();

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');       
        Route::resource('/posts', 'PostController');
        Route::resource('/categories', 'CategoryController');
        Route::resource('/tags', 'TagController');

        // //-@index
        // Route::get('/', 'PostController@index')->name('index'); 
        // //-@store
        // Route::post('/posts', 'PostController@store')->name('store'); 


        // //nuovo post -@create pagina con form
        // Route::get('/posts/create', 'PostController@create')->name('create'); 

        // //-@show
        // Route::get('/posts/{post}', 'PostController@show')->name('show');
        // //modifico post->ritorna show
        // Route::match(['PUT', 'PATCH'], '/posts/{post}', 'PostController@update')->name('update');

        // //-@delete
        // Route::delete('/posts/{post}', 'PostController@destroy')->name('destroy');

        // //-@edit
        // Route::get('/posts/{post}/edit', 'PostController@edit')->name('edit');

    });

