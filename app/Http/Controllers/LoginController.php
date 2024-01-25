<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        // if (Auth::check()) {
        //     return redirect('/');
        // } else {
        //     $data = [
        //         'title' => 'Login SIO-Wisata',
        //     ];
        //     return view('login', $data);
        // } // jika admin login, maka website public juga sudah login oleh admin, tidak dapat melakukan login lagi untuk visitor, admin harus logout terlebih dahulu 
        
        $data = [
            'title' => 'Login SIO-Wisata',
        ];
        return view('login', $data);
    }

    public function actionlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required', 
        ],[
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);
        
        $credentials = $request->only('email', 'password');

        if (Auth::guard('visitor')->attempt($credentials)) {
            return redirect('/')->with('success', 'Berhasil Login sebagai ');
        }

        return back()->with('error', 'Email atau Password Salah');

        // dd($request->all());
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
