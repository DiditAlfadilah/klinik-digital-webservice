<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::guard('api')->attempt($credentials)) {

            return response()->json([
                'message' => 'Login Failed'
            ], 401);

        }

        return response()->json([
            'token' => $token
        ]);
    }

    public function me()
    {
        return response()->json(Auth::guard('api')->user());
    }

    public function refresh()
    {
        return response()->json([
            'token' => Auth::guard('api')->refresh()
        ]);
    }

    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([
            'message' => 'Logout Success'
        ]);
    }
}