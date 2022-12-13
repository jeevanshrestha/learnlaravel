<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\User\UserController;
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

Route::apiResource('/petition', PetitionController::class);
Route::resource('/author', AuthorController::class)->only([
    'index','show'
]);

//Route::apiResource('/buyer',  BuyerController::class);
Route::resource('/buyers', BuyerController::class)->only([
    'index','show'
]);

Route::resource('/sellers', SellerController::class)->only([
    'index','show'
]);

Route::resource('/categories', SellerController::class)->except([
    'create','edit'
]);

Route::resource('/products', ProductController::class)->only([
    'index','show'
]);

Route::resource('/transactions', TransactionController::class)->only([
    'index','show'
]);
Route::resource('/users',  UserController::class)->except([
    'create','edit'
]);

