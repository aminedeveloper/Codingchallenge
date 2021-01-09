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


Route::get('/','ProductController@allData'); // get all data and showing them in the home page

Route::post('addcategory','CategoryController@createCategories'); // add category route


Route::post('addproduct','ProductController@createProduct'); // add product route
Route::get('deleteproduct/{productid}','ProductController@deleteProduct'); // delete product route

Route::post('products','ProductController@filterProduct'); // filter product route
Route::post('productscategory','ProductController@filterProductcategory'); // filter product by category route 


 
