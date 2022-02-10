<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register/super-admin', [RegisterController::class, 'createSuperAdmin']);
Route::post('/login/super-admin', [LoginController::class, 'superAdminLogin']);
Route::group(['prefix' => 'super-admin', 'middleware' => ['auth:super-admin-api']], function () {
    // authenticated staff routes here

    Route::get('dashboard', [LoginController::class, function (Request $request) {

        // if ($request->user()->tokenCan('super-admin')) {

        return  $request->user();
        // }

        // return "you don't have super-admin scope";
    }]);
    Route::post('logout', [LoginController::class, 'logout']);
});

