<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use App\Models\SalesManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register/sales-manager', [RegisterController::class, 'createSalesManager']);
Route::post('/login/sales-manager', [LoginController::class, 'salesManagerLogin']);
Route::group(['prefix' => 'sales-manager', 'middleware' => ['auth:sales-manager-api']], function () {
    // authenticated staff routes here

    Route::get('dashboard', [LoginController::class, function (Request $request) {

        $sales_manager = SalesManager::select('sales_managers.*')->find(auth()->guard('sales-manager-api')->user()->id);
        // return AdminResource::make($admin);
        return ($sales_manager);

    }]);
    Route::post('logout', [LoginController::class, 'logout']);
});

