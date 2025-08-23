<?php

namespace App\Http\Controllers\V1\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\API\Auth\AuthResources;
use App\Http\Requests\V1\API\Auth\AuthRequest;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // REGISTER
    public function register(AuthRequest $request)
    {
        $data = $request->validated();

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $customer = Customers::create($data);

        return response()->json([
            'success' => true,
            'data'    => new AuthResources($customer)
        ], 201);
    }

    // LOGIN
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $customer = Customers::where('email', $credentials['email'])->first();

        if (! $customer || ! Hash::check($credentials['password'], $customer->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password'
            ], 401);
        }

        // Generate token menggunakan Sanctum
        $token = $customer->createToken(env('MASTER_TOKEN'))->plainTextToken;


        // KETIKA PRODCTION AKTIFKAN DAN CEK FILE CORS.PHP UNTUK DI AKTIFKAN
        // $cookie = cookie(
        //     'auth_token',                // nama cookie
        //     $token,                      // value token
        //     60 * 24,                     // durasi 24 jam
        //     null,                        // path default
        //     null,                        // domain default
        //     config('app.env') === 'production', // secure hanya di production
        //     true,                        // HttpOnly tetap true
        //     false,                       // raw = false
        //     'Strict'                     // SameSite
        // );

        $cookie = cookie(
            'auth_token',
            $token,
            60 * 24,
            null,
            null,
            false,        // secure = false untuk local
            true,
            false,
            'Lax'         // atau 'None' jika cross-origin + secure
        );

        // Return response tanpa expose token di body
        return response()->json([
            'success' => true,
            'data'    => new AuthResources($customer),
        ], 200)->cookie($cookie);
    }

    // LOGOUT
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $cookie = cookie()->forget('auth_token');

        return response()->json([
            'success' => true,
            'message' => 'Logged out'
        ])->cookie($cookie);
    }

    // PROFIL
    public function profile(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => new AuthResources($request->user())
        ]);
    }
}
