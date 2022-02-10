<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/register/super-admin', [RegisterController::class, 'createSuperAdmin']);
// Route::post('/login/super-admin', [LoginController::class, 'superAdminLogin']);
// Route::group(['prefix' => 'admin', 'middleware' => ['auth:super-admin-api']], function () {
//     // authenticated staff routes here

//     Route::get('dashboard', [LoginController::class, function (Request $request) {

//         // if ($request->user()->tokenCan('admin')) {

//         return  $request->user();
//         // }
//     }]);
// });
// Route::post('/logout', [LoginController::class, 'logout']);
