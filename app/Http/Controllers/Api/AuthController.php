<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'Register Success',
            'data' => $user
        ], 200);
    }

    // LOGIN
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

    // USER LOGIN INFO
    public function me()
    {
        return response()->json(Auth::guard('api')->user());
    }

    // REFRESH TOKEN
    public function refresh()
    {
        return response()->json([
            'token' => Auth::guard('api')->refresh()
        ]);
    }

    // LOGOUT
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([
            'message' => 'Logout Success'
        ]);
    }
}