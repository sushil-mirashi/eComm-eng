<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PostController;

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

Route::get('/', [ProductController::class, "index"]);

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, "login"]);
Route::get('/cache', [CacheController::class, 'index']);
Route::get('/country', [CountryController::class, 'index']);
Route::get('/getcountrycode/{name}', [CountryController::class, 'getCountryCode']);

Route::get('/mathAndLog', [UserController::class, "mathAndLog"]);
Route::get('/http/{name?}', [UserController::class, "httpReq"]);

Route::get('/search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

Route::prefix('relation')->group(function () {
    Route::get('/create_post', [PostController::class, "create_post"]);
});