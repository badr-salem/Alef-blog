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

Route::get('/' , 'PageController@index')->name('index');

Route::get('contact', 'PageController@contact');
Route::post('contact', 'PageController@storeContact');
Route::get('about', 'PageController@about');
Route::get('clear-my-name' , 'PageController@clearName');

Route::get('system-closed', function(){
  return "sory we only work on tuesdays";
});



Route::get('users/{id}/email/{email?}', function($id ,$email = null){
  echo "user id is : ".$id ."  and email is : ".$email;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles' , 'articleController');

// Route::resource('comments' , 'commentController');
Route::post('comments/{article}' ,'CommentController@store')->name('comments.store');
Route::delete('comments/{comment}' ,'CommentController@destroy')->name('comments.destroy');
