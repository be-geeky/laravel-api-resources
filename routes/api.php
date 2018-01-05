<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

//List Products
Route::get('products', 'ProductController@index')->middleware('auth:api');

//List Single Product
Route::get('/products/{id}', 'ProductController@show')->middleware('auth:api');

//Create New Product
Route::post('/products/{id}', 'ProductController@store')->middleware('auth:api');

//Update Product
Route::put('/products/{id}', 'ProductController@store')->middleware('auth:api');

//Delete Product
Route::delete('/products/{id}', 'ProductController@destroy')->middleware('auth:api');