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

Route::redirect('/','/login');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/relations', 'HomeController@relations');
Route::resource('blogs','BlogController');
Route::post('like', 'LikeController@store')->name('like.store');
Route::post('comment', 'CommentController@store')->name('comment.store');
