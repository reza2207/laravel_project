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

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/index', 'HomeController@index');
Route::get('/profile/{id}', 'ProfileController@index')->name('profile');
Route::get('/market-place', 'MarketController@index');
Route::get('/post-note', 'PostnoteController@index');
Route::get('/noteToPost', 'HomeController@index');

Route::post('noteToPost', 'PostnoteController@note')->name('noteToPost');
Route::post('noteReplies', 'PostnoteController@replies')->name('noteReplies');

//Route::get('/summernote','summernote');
//summernote store route
Route::post('/post-note/store','PostnoteController@store')->name('summernotePersist');

Route::get('/post-note/store', 'PostnoteController@index');

Route::post('/product', 'ProductController@store');
Route::get('/product/paginate', 'ProductController@paginate');
Route::get('/product/{id}', 'ProductController@show');
Route::get('/product', 'ProductController@view');


