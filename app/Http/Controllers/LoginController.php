<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        // Cek apakah pengguna sudah login, jika ya, redirect ke halaman utama
        if (Auth::check()) {
            return redirect('/');
        }

        $data = [
            'title' => 'Login SIO-Wisata',
        ];

        return view('login', $data);
    }

    public function actionlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('visitor')->attempt($credentials)) {
            return redirect('visitor')->with('success', 'Berhasil Login sebagai ' . Auth::guard('visitor')->user()->name);
        }

        return back()->with('error', 'Email atau Password Salah');
    }

    public function actionlogout()
    {
        Auth::guard('visitor')->logout();
        Session::flush();

        return redirect('/');
    }
}
