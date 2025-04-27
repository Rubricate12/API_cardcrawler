<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // USER REGISTRATION
    public function register(Request $request)
    {
        #validasi user dan pass
        $request->validate([
            'username' => 'required|unique:users',
            'pass' => 'required|min:4',
        ], [
            'username.required' => 'The username is required.',
            'username.unique' => 'The username is already taken.',
            'pass.required' => 'The password is required.',
            'pass.min' => 'The password must be at least 4 characters long.',
        ]);
        #buat semua data user
        $user = User::create([
            'username' => $request->username,
            'pass' => Hash::make($request->pass),
            'gamedata' => json_encode([]),
            'achievements' => json_encode([]),
        ]);
        unset($user['pass']);
        #kembalikan dalam json dan status 201 jika berhasil
        return response()->json([
            'message' => 'User registered successfully!',
            'user' => $user,
        ], 201);
    }

    // USER LOGIN
    public function login(Request $request)
    {
        #validasi
        $request->validate([
            'username' => 'required',
            'pass' => 'required',
        ]);
        #cek isi dari kolom username pertama yang muncul dari tabel
        $user = User::where('username', $request->username)->first();
        #jika tidak ada username yang sama, maka invalid
        if (!$user || !Hash::check($request->pass, $user->pass)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        #kembalikan dalam json ke app bahwa login berhasil
        return response()->json([
            'message' => 'Login successful!',
            'user' => $user,
        ]);
    }
}
