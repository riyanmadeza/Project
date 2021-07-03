<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AuthPesertaController;
use App\Http\Controllers\CabangController;

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

Route::post('login/admin', [AuthController::class, 'login']);
Route::post('register/admin', [AuthController::class, 'register']);

Route::post('login/peserta', [AuthPesertaController::class, 'login']);
Route::post('register/peserta', [AuthPesertaController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('logout/admin', [AuthController::class, 'logout']);
    Route::post('logout/peserta', [AuthPesertaController::class, 'logout']);

    Route::get('cabang', [CabangController::class, 'index']);
    Route::post('cabang/search', [CabangController::class, 'search']);
    Route::post('cabang', [CabangController::class, 'store']);
    Route::delete('cabang', [CabangController::class, 'delete']);

});
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
