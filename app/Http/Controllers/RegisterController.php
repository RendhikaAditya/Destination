<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Visitor;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            $data = [
                'title' => 'Register SIO-Wisata',
            ];
            return view('register', $data);
        }
        
    }

    public function actionRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ],[
            'name.required' => 'Nama wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email telah terdaftar',
            'password.required' => 'Password wajib diisi',
        ]);
        
        $user = new Visitor();

        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return back()->with('success', 'Register Successfully');
        // dd($request->all());
    }
}
