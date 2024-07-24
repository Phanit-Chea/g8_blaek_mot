<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AboutUsSlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\Api\FolderController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\API\ResetPasswordController;
use App\Http\Controllers\AuthController;

use App\Models\Rating;
use App\Http\Controllers\Api\StoreFoodController;
use App\Http\Controllers\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SaveFoodController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GroupChatController;
use App\Http\Controllers\MessageController;

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
//category
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.create'); // ->middleware('auth:sanctum');
Route::get('category/list', [CategoryController::class, 'index'])->name('categiry.list');
Route::get('category/show/{id}', [CategoryController::class, 'show'])->name('categiry.show');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('categiry.update');
Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('categiry.destroy');

//mediaImage

// Remove or merge the following line if it was part of the conflict
// Route::post('/register', [AuthController::class, 'register']);

//food

Route::post('/save/create/{id}', [SaveFoodController::class, 'store'])->name('save.create')->middleware('auth:sanctum');
Route::get('/save/list', [SaveFoodController::class, 'listAllSaveFoodBySpecificUser'])->name('save.list')->middleware('auth:sanctum');
Route::get('/save/list/{folderID}', [SaveFoodController::class, 'listSaveFoodByFolder'])->name('save.list.byfolder')->middleware('auth:sanctum');
Route::delete('/save/delete/{id}', [SaveFoodController::class, 'destroy'])->name('save.delete');

Route::post('/register', [ApiAuthController::class, 'register']);

///=============create food=========//
Route::prefix("folder")->group(function () {
    Route::get('/list', [FolderController::class, 'index'])->name('folder.list')->middleware('auth:sanctum');
    Route::get('/list/byUser', [FolderController::class, 'listByUser'])->name('folder.list.byuser')->middleware('auth:sanctum');
    Route::post('/create', [FolderController::class, 'store'])->name('folder.create')->middleware('auth:sanctum');
    Route::put('/update/{id}', [FolderController::class, 'update'])->name('folder.update')->middleware('auth:sanctum');
    Route::delete('/delete/{id}', [FolderController::class, 'destroy'])->name('folder.delete')->middleware('auth:sanctum');
});


Route::prefix("food")->group(function () {
    Route::post('/create', [FoodController::class, 'store'])->name('food.create')->middleware('auth:sanctum');
    Route::get('/list', [FoodController::class, 'index'])->name('food.list');
    Route::get('/show/{id}', [FoodController::class, 'show'])->name('food.show');
    Route::post('/update/{id}', [FoodController::class, 'update'])->name('food.update');
    Route::delete('/delete/{id}', [FoodController::class, 'destroy'])->name('food.delete');
    Route::get('bycategory/{id}', [FoodController::class, 'listFoodByCategory'])->name('food.listfoodbycategory');
    Route::get('/random/{categoryID}', [FoodController::class, 'getRandomFood'])->name('food.random');
    Route::get('/categories/food-count', [FoodController::class, 'categoryFoodCountsJson']);
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
    Route::get('bycategory/{id}', [FoodController::class, 'listFoodByCategory'])->name('food.listfoodbycategory');
    Route::get('/random/{categoryID}', [FoodController::class, 'getRandomFood'])->name('food.random');
    Route::get('/weekly/random', [FoodController::class, 'getWeeklyRandomFood'])->name('food.weekly.random')->middleware('auth:sanctum');
});


// Chat related routes
Route::prefix('chat')->group(function () {
    Route::post('/create/{to_user}', [ChatController::class, 'storeUser'])->middleware('auth:sanctum')->name('chat.create');
    Route::get('/list', [ChatController::class, 'index'])->name('chat.list');
    Route::get('/{to_user}', [ChatController::class, 'show'])->name('chat.show')->middleware('auth:sanctum');
    Route::put('/update/{id}', [ChatController::class, 'update'])->name('chat.update')->middleware('auth:sanctum');
    Route::delete('/delete/{id}', [ChatController::class, 'destroy'])->name('chat.destroy')->middleware('auth:sanctum');

    Route::middleware('auth:sanctum')->get('/users/except-me', [ChatController::class, 'index']);
    Route::middleware('auth:sanctum')->get('/users/chatList', [ChatController::class, 'listChat']);
    Route::middleware('auth:sanctum')->get('/allUser/Chat/{userId}', [ChatController::class, 'getChatMessages']);
    Route::middleware('auth:sanctum')->get('/count/unread', [ChatController::class, 'countUnreadMessages']);
});
// group chat 
Route::prefix('group')->group(function () {
    Route::middleware('auth:sanctum')->post('/create', [GroupChatController::class, 'createGroup'])->name('group.create');
    Route::middleware('auth:sanctum')->post('/{group_id}/addUser', [GroupChatController::class, 'addUsersToGroup'])->name('user.addUser');
    Route::middleware('auth:sanctum')->post('/{group_id}/messages', [GroupChatController::class, 'sendMessage'])->name('user.sendMessage');
    Route::middleware('auth:sanctum')->get('/{groupId}/messages', [MessageController::class, 'getChatMessages'])->name('user.getMessages');
    Route::middleware('auth:sanctum')->get('/fetch/listGroup', [MessageController::class, 'getGroupsWithLatestMessages']);
});


// update active chat 
Route::post('/chats/{id}/update-active', [ChatController::class, 'updateActive']);

// About us related routes
Route::post('/aboutus/update', [AboutUsController::class, 'updateAboutUs'])->name('aboutus.update');
Route::post('/aboutus/create', [AboutUsController::class, 'createAboutUs'])->name('aboutus.create');
Route::get('/aboutus/latest', [AboutUsController::class, 'getLatest']);

Route::post('/aboutUsSlide/create', [AboutUsSlideController::class, 'createSlide'])->name('aboutus.createAboutUsSlide');
Route::get('/imageSlide/lists', [AboutUsSlideController::class, 'index'])->name('aboutus.imageSlide');
//==========CountStars===============//
Route::prefix('ratings')->group(function () {
    Route::post('/create', [RatingController::class, 'store']);
    Route::get('averages/{foodId}', [RatingController::class, 'calculateAverageRating']);
    Route::get('count-users/{foodId}', [RatingController::class, 'countUsersRatedFood']);
    Route::get('/list', [RatingController::class, 'index']);
    Route::get('/list/feedback/{foodId}', [RatingController::class, 'show']);
    Route::delete('/feedback/{id}', [RatingController::class, 'destroy']); // Delete comment
});

Route::post('/logout', [ApiAuthController::class, 'logout']);
Route::get('/user', [ApiAuthController::class, 'index']);

Route::post('/forgotPassword', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('resetPassword', [ResetPasswordController::class, 'resetPassword']);
Route::prefix('storeFood')->group(function () {
    Route::get('/list/all', [StoreFoodController::class, 'index'])->name('storeFood.list');
    Route::get('/list', [StoreFoodController::class, 'listAllStoreFood'])->name('storeFood.listAll')->middleware('auth:sanctum');
    Route::post('/store/{id}', [StoreFoodController::class, 'store'])->name('storeFood.store')->middleware('auth:sanctum');
    Route::delete('/delete/{id}', [StoreFoodController::class, 'destroy'])->name('storeFood.delete')->middleware('auth:sanctum');
});
