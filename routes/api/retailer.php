<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Resources\RetailerResource;
use App\Models\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register/retailer', [RegisterController::class, 'createRetailer']);
Route::post('/login/retailer', [LoginController::class, 'retailerLogin']);
Route::group(['prefix' => 'retailer', 'middleware' => ['auth:retailer-api']], function () {
    // authenticated staff routes here

    Route::get('dashboard', [LoginController::class, function (Request $request) {

        $retailer = Retailer::select('retailers.*')->with('distributor','subDistributor')->find(auth()->guard('distributor-api')->user()->id);
        return RetailerResource::make($retailer);

    }]);
    Route::post('logout', [LoginController::class, 'logout']);
});

