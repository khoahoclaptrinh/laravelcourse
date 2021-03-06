<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('v1')->group(function () {

    //News
    Route::prefix('news')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\V1\Post\PostController::class, 'index'])->name('api.post.index');
        Route::post('/store', [\App\Http\Controllers\Api\V1\Post\PostController::class, 'store'])->name('api.store.show');
        Route::get('/{id}', [\App\Http\Controllers\Api\V1\Post\PostController::class, 'show'])->name('api.post.show');
    });


    Route::post('login', [\App\Http\Controllers\Auth\AuthController::class, 'login']);
    Route::middleware('jwt.verify')->group(function () {

        //users
        Route::prefix('users')->group(function () {
            //Route::get('/', [UserController::class,'index'])->name('api.users.index');
            Route::post('me', [\App\Http\Controllers\Auth\AuthController::class, 'me'])->name('api.users.me');
            Route::post('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('api.users.logout');
            Route::post('refresh',  [\App\Http\Controllers\Auth\AuthController::class, 'refresh'])->name('api.users.refresh');
        });

        //Category
    });
});
