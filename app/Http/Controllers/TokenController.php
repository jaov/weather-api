<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Exceptions\ValidationException;


class TokenController extends Controller
{
    public static function create(Request $request) {
    //
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'token_name' => [
            'required',
            function ($attribute, $value, $fail) use ($request) {
                $user = \App\Models\User::where('email', $request->email)->first();
                if ($user && $user->tokens()->where('name', $value)->exists()) {
                    $fail('Un token con este nombre ya existe en la cuenta');
                }
            },
        ],
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciales incorrectas',
            ], 401);
        }

        $token = $user->createToken($request->token_name)->plainTextToken;


        return response()->json([
            'token' => $token,
            'type' => 'Bearer'
        ]);
    }
}
