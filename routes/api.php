<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products','ProductController');

Route::group(['prefix'=>'products'],function(){

	Route::apiResource('{product}/reviews','ReviewController');

});

//localhost/FirstApi_product/products
//localhost/FirstApi_product/products/12/reviews