<?php

use App\Http\Controllers\OrderController;

Route::get('/customer/{id}/{name}/{address}', [OrderController::class, 'customer']);
Route::get('/item/{itemNo}/{name}/{price}', [OrderController::class, 'item']);
Route::get('/order/{customerId}/{name}/{orderNo}/{date}', [OrderController::class, 'order']);
Route::get('/orderdetails/{transNo}/{orderNo}/{itemId}/{name}/{price}/{qty}', [OrderController::class, 'orderDetails']);

