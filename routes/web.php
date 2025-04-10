<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', ProductController::class);
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "DB connection success!";
    } catch (\Exception $e) {
        return "DB connection failed: " . $e->getMessage();
    }
});