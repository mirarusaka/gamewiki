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
Route::get('/', 'AboutController@top')->name('top');

Route::get('/contact', 'FormController@Form')->name('form.contact');

Route::post('/contact/firm', 'FormController@firm')->name('form.contact_firm');

Route::post('/contact/thanks', 'FormController@done')->name('contact_thanks');

Route::get('/about', 'AboutController@about')->name('about');

Route::get('/toroku', 'AboutController@toroku')->name('toroku');

Route::get('/links', 'AboutController@link')->name('links');

Route::get('/pages', 'PageController@index')->name('pages');

Route::get('/pages/{page}', 'PageController@show')->name('pages.show');

Route::post('/pages/comment', 'PageController@comment')->name('pages.comment');

Route::post('/pages/comment', 'CommentController@add')->name('pages.comment');

Route::post('/pages/ine', 'PageController@ine')->name('pages_ine');

Route::get('/create', 'PageController@create')->name('create');

Route::post('/create/firm', 'PageController@pagefirm')->name('create_firm');

Route::post('/create/done', 'PageController@done');

Route::get('pages/{page}/edit', 'PageController@edit')->name('pages.edit');

Route::post('pages/{page}', 'PageController@update')->name('pages.update');

Route::get('pages/{page}/delete', 'PageController@delete')->name('pages.del');

Route::post('/page/remove', 'PageController@remove')->name('remove');

Route::post('/pages/find', 'PageController@find')->name('pages.find');

Route::get('/serach', 'SearchController@index')->name('search');

Route::get('/serach/name', 'SearchController@name')->name('search_name');

Route::get('/serach/contents', 'SearchController@janru')->name('search_janru');

Route::post('/serach/result', 'SearchController@find')->name('search_find');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/image','UploadImageController@show')->name("upload_form");

Route::post('/upload','UploadImageController@upload')->name("upload_image");

Route::get('/list', 'ImageListController@show')->name("image_list");