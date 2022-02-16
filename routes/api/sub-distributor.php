<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Resources\SubDistributorResource;
use App\Models\SubDistributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register/sub-distributor', [RegisterController::class, 'createSubDistributor']);
Route::post('/login/sub-distributor', [LoginController::class, 'subDistributorLogin']);
Route::group(['prefix' => 'sub-distributor', 'middleware' => ['auth:sub-distributor-api']], function () {
    // authenticated staff routes here

    Route::get('dashboard', [LoginController::class, function (Request $request) {

        $sub_distributor = SubDistributor::select('sub_distributors.*')->with('distributor')->find(auth()->guard('distributor-api')->user()->id);
        return SubDistributorResource::make($sub_distributor);

    }]);
    Route::post('logout', [LoginController::class, 'logout']);
});

