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

Route::get('/', 'BlogController@listPosts');
Route::get('/page/{page}', 'BlogController@listPosts');
Route::get('/category/{category}', 'BlogController@listPostsByCategory');
Route::get('/category/{category}/page/{page}', 'BlogController@listPostsByCategory');
Route::get('/post/{postId}', 'BlogController@viewPost');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/posts', 'AdminController@listPosts');
Route::get('/admin/posts/page/{page}', 'AdminController@listPosts');
Route::get('/admin/posts/new', 'AdminController@editPost');
Route::get('/admin/posts/{postId}', 'AdminController@editPost');
Route::post('/admin/posts/new', 'AdminController@savePost');
Route::post('/admin/posts/{postId}', 'AdminController@savePost');

Route::get('/admin/categories', 'AdminController@listCategories');
Route::get('/admin/categories/new', 'AdminController@editCategory');
Route::get('/admin/categories/{postId}', 'AdminController@editCategory');
Route::post('/admin/categories/new', 'AdminController@saveCategory');
Route::post('/admin/categories/{postId}', 'AdminController@saveCategory');
