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

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('signup/confirm/{token}','UsersController@confirmEmail')->name('confirm_email');

Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//书架（dashboard）
Route::get('users/{id}/bookList', 'BookListController@index')->name('book_list');
Route::get('/book/allBook/addBook/{bookId}','BookListController@addItem')->name('addBook');
Route::delete('/book/bookList/{id}/delete','BookListController@rmItem')->name('rmBook');

//个人作品（dashboard）
Route::get('users/{id}/myBook','BookController@index')->name('my_book');
//文章页面
Route::get('/novels/novel/{chapterId}','BookContentController@show')->name('novel');
//所有书列表
Route::get('/book/allBook','BookController@allBook')->name('allBook');
//书章节列表
Route::get('book/{bookId}/chapterList','BookContentController@index')->name('chapterList');
//添加新书
Route::get('/book/newBook','BookController@newBook')->name('newBook');
Route::post('/book/save','BookController@add')->name('saveBook');
//新章节
Route::get('book/{bookId}/newChapter','BookContentController@create')->name('write');
Route::patch('book/{bookId}/editChapter/{chapterId}', 'BookContentController@update')->name('editChapter');
Route::resource('book/{bookId}/bookContent','BookContentController');
//删除书
Route::delete('book/{bookId}/delete','BookController@destroy')->name('destroyBook');
