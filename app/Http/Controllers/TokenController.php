<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Exceptions\ValidationException;


class TokenController extends Controller
{
    public function create(Request $request) {
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
            ]);
        }

        $token = $user->createToken($request->token_name)->plainTextToken;


        return response()->json([
            'token' => $token,
            'type' => 'Bearer'
        ]);
    }

    public function web_create(Request $request) {
        $user = $request->user();
        $token_name = $request->token_name;

        if ($user && $user->tokens()->where('name', $token_name)->exists()) {
            return ['message'=> 'Un token con este nombre ya existe en la cuenta'];
        }

        $token = $request->user()->createToken($token_name);

        return ['token' => $token->plainTextToken,
                'type' => 'Bearer'];
    }

}
