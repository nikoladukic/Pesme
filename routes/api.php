<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\PesmaController;
use App\Http\Controllers\API\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/category',[CategoryController::class,'store']);

Route::resource('users',UserController::class);

Route::get('pesmas/izvodjac/{id}',[PesmaController::class,'getByIzvodjac']);

Route::get('pesmas/kategorija/{id}',[PesmaController::class,'getByCategory']);

Route::resource('pesmas',PesmaController::class);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
   
    Route::get('my-pesmas',[PesmaController::class,'myPesmas']);

    Route::post('/logout',[AuthController::class,'logout']);

    Route::resource('pesmas',PesmaController::class)->only('store','update','destroy');
    
});

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategorijas',[KategorijaController::class,'index']);
