<?php

use App\Http\Controllers\api\AuthController as ApiAuthController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class,'register']);
Route::get('/me', [AuthController::class, 'index'])->middleware('auth:sanctum');
Route::get('/post/list', [PostController::class, 'index'])->middleware('auth:sanctum');

//user profile
Route::get('/user/list', [AuthController::class, 'getuserList']);
Route::post('/user/update/{id}', [AuthController::class, 'update']);

// Route::post('/register', [AuthController::class, 'register']);


///=============create food=========//

Route::prefix("food")->group(function(){
    Route::post('/create',[FoodController::class,'store'])->name('food.create');
});
