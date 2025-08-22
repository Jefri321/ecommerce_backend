<?php

use App\Http\Controllers\V1\API\TrainingController as APITrainingController;
use App\Http\Controllers\V1\API\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Endpoint untuk membuat order & checkout

Route::fallback(function () {
    return response()->json([
        'success' => false,
        'message' => 'Endpoint not found'
    ], 404);
});

// Endpoint Midtrans notification
Route::post('/payment/notification', [PaymentController::class, 'notification'])
    ->middleware('midtrans.verify'); // 
