<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Resources\SalesResource;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register/sales', [RegisterController::class, 'createSales']);
Route::post('/login/sales', [LoginController::class, 'salesLogin']);
Route::group(['prefix' => 'sales', 'middleware' => ['auth:sales-api']], function () {
    // authenticated staff routes here

    Route::get('dashboard', [LoginController::class, function (Request $request) {

        $sales = Sales::select('sales.*')->with('salesManager')->find(auth()->guard('sales-api')->user()->id);
        return SalesResource::make($sales);

    }]);
    Route::post('logout', [LoginController::class, 'logout']);
});

