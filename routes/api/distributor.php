<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Resources\DistributorResource;
use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register/distributor', [RegisterController::class, 'createDistributor']);
Route::post('/login/distributor', [LoginController::class, 'distributorLogin']);
Route::group(['prefix' => 'distributor', 'middleware' => ['auth:distributor-api']], function () {
    // authenticated staff routes here

    Route::get('dashboard', [LoginController::class, function (Request $request) {

        $distributor = Distributor::select('distributors.*')->with('sales')->find(auth()->guard('distributor-api')->user()->id);
        return DistributorResource::make($distributor);

    }]);
    Route::post('logout', [LoginController::class, 'logout']);
});

