<?php

use App\Http\Controllers\api\AuthController as ApiAuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;
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
Route::post('/category/create', [CategoryController::class, 'store'])->middleware('auth:sanctum');

// Remove or merge the following line if it was part of the conflict
// Route::post('/register', [AuthController::class, 'register']);

Route::post('/register', [ApiAuthController::class, 'register']);

///=============create food=========//

Route::prefix("food")->group(function(){
    Route::post('/create',[FoodController::class,'store'])->name('food.create');
});
Route::prefix("chat")->group(function(){
    Route::post('/create/{to_user}',[ChatController::class,'store'])->name('chat.create')->middleware('auth:sanctum');
    Route::get('/list',[ChatController::class,'index'])->name('chat.list');
    Route::get('/{to_user}', [ChatController::class,'show'])->name('chat.show')->middleware('auth:sanctum');
    Route::put('/update/{id}',[ChatController::class,'update'])->name('chat.update')->middleware('auth:sanctum');
    Route::delete('/delete/{id}',[ChatController::class,'destroy'])->name('chat.destroy')->middleware('auth:sanctum');
});
