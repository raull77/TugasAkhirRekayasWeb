<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    // ---------------- REGISTER ----------------
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'message' => 'Registrasi berhasil',
            'data'    => $user
        ], 201);
    }

    // ---------------- LOGIN ----------------
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token
        ]);
    }

    // ---------------- PROFILE ----------------
    public function profile(Request $request)
    {
        return response()->json($request->user());
    }

    // ---------------- REFRESH TOKEN ----------------
    public function refresh(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        $newToken = $request->user()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Token refreshed',
            'token' => $newToken
        ]);
    }

    // ---------------- LOGOUT ----------------
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }
}
