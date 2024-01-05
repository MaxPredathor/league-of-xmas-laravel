<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json([
                'status' => true,
                'message' => 'User logged in successfully'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Invalid email or password (or maybe you are the invalid one)'
        ]);
    }
}
