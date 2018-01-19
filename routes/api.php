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

// Product routes
Route::group(['middleware' => 'auth.basic'], function() {
    Route::get('products', 'ProductsController@listProducts');
    Route::get('products/{productId}', 'ProductsController@getProduct');
    Route::post('products', 'ProductsController@createProduct');
    Route::put('products/{productId}', 'ProductsController@updateProduct');
    Route::delete('products/{productId}', 'ProductsController@deleteProduct');
});

// Review routes
Route::group(['middleware' => 'auth.basic'], function() {
    Route::get('products/{productId}/reviews', 'ReviewsController@listReviews');
    Route::get('products/{productId}/reviews/{reviewId}', 'ReviewsController@getReview');
    Route::post('products/{productId}/reviews', 'ReviewsController@createReview');
    Route::put('products/{productId}/reviews/{reviewId}', 'ReviewsController@updateReview');
    Route::delete('products/{productId}/reviews/{reviewId}', 'ReviewsController@deleteReview');
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


