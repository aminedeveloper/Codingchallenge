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


Route::get('/','ProductController@allData');

Route::post('addcategory','CategoryController@createCategories');
Route::post('deletecategory','CategoryController@deleteCategory');

Route::post('addproduct','ProductController@createProduct');
Route::post('deleteproduct','ProductController@deleteProduct');