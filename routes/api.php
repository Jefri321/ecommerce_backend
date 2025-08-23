<?php

use App\Http\Controllers\V1\API\AuthController;
use App\Http\Controllers\V1\API\TrainingController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::get('/master', [TrainingController::class, 'index']);
    Route::get('/master/detail/{id}', [TrainingController::class, 'show']);
    Route::post('/master/checkout', [TrainingController::class, 'checkout']);
});

Route::prefix('user')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/v1/notification', [TrainingController::class, 'notification']);

Route::post('/token', function (Request $request) {
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required|string'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken(env('MASTER_TOKEN'))->plainTextToken;

    return response()->json([
        'api_key' => $token,
        'data' => $user
    ]);
});
