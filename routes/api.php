<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Ecommerce\ProductsController;
use App\Http\Controllers\StallController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Wallet\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|| Here is where you can register API routes for your application. These

*/

Route::get('stalls', [StallController::class, 'index']);
Route::get('stalls/{slug}', [StallController::class, 'show']);
Route::get('{stall:slug}/products', [ProductsController::class, 'show']);

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
   Route::post('register', [RegisterController::class, 'store']);
   Route::post('login', [LoginController::class, 'login'])->name('login');
   Route::post('password/forgot', [ForgotPasswordController::class, 'index'])
      ->name('password.email');
   Route::post('password/reset', [ForgotPasswordController::class, 'index'])
      ->name('password.update');
});


Route::middleware(['auth'])->group(function () {
   Route::get('user', UserProfileController::class)->name('user');
   Route::post('logout', [LoginController::class, 'logout'])->name('logout');
   Route::post('email/verify/{user}', [VerifyEmailController::class, 'verify'])
      ->name('verification.verify')
      ->middleware('signed');

   Route::middleware(['verified'])->group(function () {

      Route::middleware(['stall'])->group(function () {
         Route::post('products', [ProductsController::class, 'store']);
      });

      Route::post('wallet/transfer', [WalletController::class, 'transfer']);
      Route::post('wallet/deposit', [WalletController::class, 'deposit']);
      Route::post('wallet/withdraw', [WalletController::class, 'withdraw']);
      Route::get('wallet/transactions', [WalletController::class, 'transactions']);
   });
});
