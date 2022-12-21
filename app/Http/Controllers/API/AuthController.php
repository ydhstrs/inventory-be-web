<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Monolog\Formatter\JsonFormatter;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'nip' => 'required|string|max:200',
            'no_hp' => 'required|string|max:200',
            'id_kota' => 'required|integer',
            'email' => 'required|email|string|max:200|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'id_kota' => $request->id_kota,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

        return ResponseFormatter::success(
            [
                "user" => $user,
            ],
            'success register'
        );
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|max:200',
            'password' => 'required|string|min:8',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return ResponseFormatter::error("Unauthenticated", "Email atau password anda salah", 402);
        }
        $user = User::where('email', $request->email)->with('kota')->firstOrFail();
        if($user->status==0){
            return ResponseFormatter::error("Unauthenticated", "Akun anda belum diverifikasi oleh admin", 402);
        }
        $token = $user->createToken('auth-sanctum')->plainTextToken;
        return ResponseFormatter::success(
            [
                "user" => $user,
                "access-token" => $token,
                "token-type" => "Bearer"
            ],
            'success login'
        );
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ResponseFormatter::success("Success", "Success Logout");
    }
}
