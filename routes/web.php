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
    return view('welcome');
});

Auth::routes();

//edit

Route::get('/home', 'HomeController@index')->name('home');

//Routes admin
//Route::get('/{anypath}','HomeController@index')->where('path','.*');

//another way to put middleware group (rather than constructor method)
Route::group(['middleware'=>['auth']],function (){
    //category
    Route::get('/category','CategoryController@all_category');
    Route::post('/add_category','CategoryController@add_category');
    Route::get('/category/{id}','CategoryController@delete_category');
    Route::get('/editcategory/{id}','CategoryController@edit_category');
    Route::post('update-category/{id}','CategoryController@update_category');

//post
    Route::get('/post','PostController@all_post');
    Route::post('/save_post','PostController@save_post');
    Route::get('/delete/{id}','PostController@delete_post');
//edit_post as get because does not submit any form request data
    Route::get('/post/{id}','PostController@edit_post');
    Route::post('/update/{id}','PostController@update_post');
});

