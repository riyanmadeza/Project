<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AuthPesertaController;
use App\Http\Controllers\JenisPerlombaanController;
use App\Http\Controllers\AppConfigurationController;
use App\Http\Controllers\JawabanKompetisiController;
use App\Http\Controllers\KategoriPerlombaanController;
use App\Http\Controllers\ParameterPerlombaanController;

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

Route::fallback(function () {
    $output[] = [
        'message' => 'Url tidak valid'
    ];
    return (new Response(['Data'=> $output],404));
});

Route::post('login/admin', [AuthController::class, 'login']);
Route::post('register/admin', [AuthController::class, 'register']);

Route::post('login/peserta', [AuthPesertaController::class, 'login']);
Route::post('register/peserta', [AuthPesertaController::class, 'register']);
Route::post('changepassword/peserta', [AuthPesertaController::class, 'changepassword']);

Route::get('cabang', [CabangController::class, 'index']);
Route::get('url', [UrlController::class, 'index']);
Route::get('config', [AppConfigurationController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('logout/admin', [AuthController::class, 'logout']);
    Route::post('logout/peserta', [AuthPesertaController::class, 'logout']);
    //cabang
    Route::post('cabang/search', [CabangController::class, 'search']);
    Route::post('cabang', [CabangController::class, 'store']);
    Route::delete('cabang', [CabangController::class, 'delete']);
    //license
    Route::get('license', [LicenseController::class, 'index']);
    Route::post('license/search', [LicenseController::class, 'search']);
    //Url
    Route::post('url/search', [UrlController::class, 'search']);
    //App Configuration
    Route::post('config/search', [AppConfigurationController::class, 'search']);
    //Jenis Perlombaan
    Route::get('jenis', [JenisPerlombaanController::class, 'index']);
    Route::post('jenis/search', [JenisPerlombaanController::class, 'search']);
    //Kategori Perlombaan
    Route::get('kategori', [KategoriPerlombaanController::class, 'index']);
    Route::post('kategori/search', [KategoriPerlombaanController::class, 'search']);
    //Parameter Perlombaan
    Route::get('parameter', [ParameterPerlombaanController::class, 'index']);
    Route::post('parameter/search', [ParameterPerlombaanController::class, 'search']);
    //JawabanKompetisi
    Route::post('kompetisi/jawaban', [JawabanKompetisiController::class, 'jawaban']);
    Route::post('kompetisi/input', [JawabanKompetisiController::class, 'input']);
});
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
