<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin-api']], function () {
    // authenticated staff routes here

    Route::get('dashboard', [LoginController::class, function (Request $request) {

        // $admin = Admin::select('admins.*')->find(auth()->guard('admin-api')->user()->id);
        $admin = Admin::select('admins.*')->with('superAdmin')->find(auth()->guard('admin-api')->user()->id);
        return AdminResource::make($admin);

    }]);
    Route::post('logout', [LoginController::class, 'logout']);
});

