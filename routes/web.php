<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
Route::get('/test-products', function () {
    try {
        $data = Product::all();
        return response()->json($data);
    } catch (\Throwable $e) {
        Log::error('Product query failed', ['error' => $e->getMessage()]);
        return response()->json(['error' => $e->getMessage()], 500);
    }
});