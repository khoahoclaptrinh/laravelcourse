<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth:backend')->group(function () {
    //Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});


Route::prefix('acp')->group(function () {

    Route::group(['middleware' => 'backend'], function () {
        //Route::get('/', [\App\Http\Controllers\Backend\Dashboard\DashboardController::class, 'index'])->name('backend.dashboard.index');


    });
});




