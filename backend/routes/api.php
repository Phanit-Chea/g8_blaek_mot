<?php
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AboutUsSlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\FolderController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\API\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController as ControllersChatController;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SaveFoodController;
use App\Http\Controllers\Api\StoreFoodController;
use App\Http\Controllers\GroupController;

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
    Route::get('/weekly/random', [FoodController::class, 'getWeeklyRandomFood']);
   
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
Route::post('/aboutus/create', [AboutUsController::class, 'createAboutUs'])->name('aboutus.create');
Route::get('/aboutus/latest', [AboutUsController::class, 'getLatest']);

Route::post('/aboutUsSlide/create', [AboutUsSlideController::class, 'createSlide'])->name('aboutus.createAboutUsSlide');
Route::get('/imageSlide/lists', [AboutUsSlideController::class, 'index'])->name('aboutus.imageSlide');
//==========CountStars===============//
Route::prefix('ratings')->group(function () {
    Route::post('/', [RatingController::class, 'store']);
    Route::get('averages/{foodId}', [RatingController::class, 'calculateAverageRating']);
    Route::get('count-users/{foodId}', [RatingController::class, 'countUsersRatedFood']);
});


Route::post('/logout', [ApiAuthController::class, 'logout']);
Route::get('/user', [ApiAuthController::class, 'index']);

Route::post('/forgotPassword', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('resetPassword', [ResetPasswordController::class, 'resetPassword']);
Route::prefix('storeFood')->group(function () {
    Route::post('/create/{id}', [StoreFoodController::class, 'store'])->name('storeFood.create')->middleware('auth:sanctum');
    Route::delete('/delete/{id}', [StoreFoodController::class, 'destroy'])->name('storeFood.delete')->middleware('auth:sanctum');
});

