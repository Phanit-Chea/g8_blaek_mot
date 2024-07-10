<?php
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\API\CategoryController as APICategoryController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
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

// Authenticated user route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Login route
Route::post('/login', [AuthController::class, 'login']);

// Auth related routes
Route::prefix('auth')->group(function () {
    Route::post('/register', [ApiAuthController::class, 'register']);
    Route::get('/me', [AuthController::class, 'index'])->middleware('auth:sanctum');
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/updateProfile', [ApiAuthController::class, 'update']);
    });
});

// User list routes
Route::get('/customers/list', [UserController::class, 'customerList']);
Route::delete('/customers/delete/{id}', [UserController::class, 'destroyCustomer']);

// Post related routes
Route::prefix('post')->middleware('auth:sanctum')->group(function () {
    Route::get('/list', [PostController::class, 'index']);
});

// Category related routes
Route::prefix('category')->group(function () {
    Route::post('/create', [APICategoryController::class, 'store'])->middleware('auth:sanctum')->name('category.create');
    Route::get('/list', [APICategoryController::class, 'index'])->name('category.list');
    Route::get('/show/{id}', [APICategoryController::class, 'show'])->name('category.show');
    Route::post('/update/{id}', [APICategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete/{id}', [APICategoryController::class, 'destroy'])->name('category.destroy');
});

// Food related routes
Route::prefix('food')->group(function () {
    Route::post('/create', [FoodController::class, 'store'])->middleware('auth:sanctum')->name('food.create');
    Route::get('/list', [FoodController::class, 'index'])->name('food.list');
    Route::get('/show/{id}', [FoodController::class, 'show'])->name('food.show');
    Route::post('/update/{id}', [FoodController::class, 'update'])->name('food.update');
    Route::delete('/delete/{id}', [FoodController::class, 'destroy'])->name('food.delete');
    Route::get('/bycategory/{id}', [FoodController::class, 'listFoodByCategory'])->name('food.listfoodbycategory');
});

// Chat related routes
Route::prefix('chat')->group(function () {
    Route::post('/create/{to_user}', [ChatController::class, 'store'])->middleware('auth:sanctum')->name('chat.create');
    Route::get('/list', [ChatController::class, 'index'])->name('chat.list');
    Route::get('/{to_user}', [ChatController::class, 'show'])->middleware('auth:sanctum')->name('chat.show');
    Route::put('/update/{id}', [ChatController::class, 'update'])->middleware('auth:sanctum')->name('chat.update');
    Route::delete('/delete/{id}', [ChatController::class, 'destroy'])->middleware('auth:sanctum')->name('chat.destroy');
});

// About us related routes
Route::post('/aboutus/update', [AboutUsController::class, 'updateAboutUs'])->name('aboutus.update');
Route::post('/aboutus/create', [AboutUsController::class, 'createAboutUs'])->name('aboutus.create');
Route::get('/aboutus/latest', [AboutUsController::class, 'getLatest']);
