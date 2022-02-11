<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin-api']], function () {
    // authenticated staff routes here

    Route::get('dashboard', [LoginController::class, function (Request $request) {

        // if ($request->user()->tokenCan('super-admin')) {

        return  $request->user();
        // }

        // return "you don't have super-admin scope";
    }]);
    Route::post('logout', [LoginController::class, 'logout']);
});

