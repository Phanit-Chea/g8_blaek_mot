<?php
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

// Auth related routes
Route::prefix('auth')->group(function () {
    Route::post('/register', [ApiAuthController::class, 'register']);
    Route::get('/me', [AuthController::class, 'index'])->middleware('auth:sanctum');
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/updateProfile', [ApiAuthController::class, 'update']);
    });
});

// user list 
Route::get('/customers/list', [UserController::class, 'customerList']);
Route::delete('/customers/delete/{id}', [UserController::class, 'destroyCustomer']);
// Post related routes
Route::prefix('post')->middleware('auth:sanctum')->group(function () {
    Route::get('/list', [PostController::class, 'index']);
});

// Food related routes
Route::prefix('food')->group(function () {
    Route::post('/create', [FoodController::class, 'store'])->name('food.create');
});

// Chat related routes
Route::prefix('chat')->group(function () {
    Route::post('/create/{to_user}', [ChatController::class, 'store'])->name('chat.create')->middleware('auth:sanctum');
    Route::get('/list', [ChatController::class, 'index'])->name('chat.list');
    Route::get('/{to_user}', [ChatController::class, 'show'])->name('chat.show')->middleware('auth:sanctum');
    Route::put('/update/{id}', [ChatController::class, 'update'])->name('chat.update')->middleware('auth:sanctum');
    Route::delete('/delete/{id}', [ChatController::class, 'destroy'])->name('chat.destroy')->middleware('auth:sanctum');
});

// About us related routes
Route::post('/aboutus/update', [AboutUsController::class, 'updateAboutUs'])->name('aboutus.update');
