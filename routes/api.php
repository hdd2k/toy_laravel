<?php

use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;

// Product routes
Route::group(['middleware' => AuthenticateWithBasicAuth::class], function() {
    Route::get('products/download', 'ProductsController@downloadProducts');
    Route::get('products', 'ProductsController@listProducts');
    Route::get('products/{productId}', 'ProductsController@getProduct');
    Route::post('products', 'ProductsController@createProduct');
    Route::put('products/{productId}', 'ProductsController@updateProduct');
    Route::delete('products/{productId}', 'ProductsController@deleteProduct');
});

// TO

// Review routes
Route::group(['middleware' => AuthenticateWithBasicAuth::class], function() {
    Route::get('products/{productId}/reviews', 'ReviewsController@listReviews');
    Route::get('products/{productId}/reviews/{reviewId}', 'ReviewsController@getReview');
    Route::post('products/{productId}/reviews', 'ReviewsController@createReview');
    Route::put('products/{productId}/reviews/{reviewId}', 'ReviewsController@updateReview');
    Route::delete('products/{productId}/reviews/{reviewId}', 'ReviewsController@deleteReview');
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


