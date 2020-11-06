<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
  
Route::get('user/create', [ HomeController::class, 'create' ]);
Route::post('user/store1', [ HomeController::class, 'store1' ]);
Route::post('user/store2', [ HomeController::class, 'store2' ]);
Route::post('user/store3', [ HomeController::class, 'store3' ]);

Route::get('/', function () {
    return view('welcome');
});
