<?php

use App\Http\Controllers\CoinController;
use App\Http\Controllers\TransactionController;
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

Route::prefix('coins')->group(function () {
    Route::get('/list', [CoinController::class, 'getCoins']);
});

Route::prefix('transactions')->group(function () {
    Route::post('/{coinGeckoId}', [TransactionController::class, 'createTransaction']);
});

Route::prefix('balances')->group(function () {
    Route::get('/', [TransactionController::class, 'getBalance']);
});
