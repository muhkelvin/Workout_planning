<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register'); // pastikan view resources/views/auth/register.blade.php sudah dibuat
    }

    // Memproses registrasi user baru
    public function register(Request $request)
    {
        // Validasi input registrasi
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|string|max:255|unique:users',
            'password'              => 'required|string|min:6|confirmed',
        ]);

        // Membuat user baru
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Login user yang baru terdaftar
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registrasi berhasil, selamat datang!');
    }
}
