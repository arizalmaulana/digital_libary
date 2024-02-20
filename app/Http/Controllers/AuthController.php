<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // cek login valid

        if (Auth::attempt($credentials)) {
            // cek user status = active
            if(Auth::user()->status != 'Aktif'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'Gagal');
                Session::flash('message', 'Akun Anda belum aktif. Silakan hubungi admin!');
                return redirect('/login');
            }

            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('admin');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('petugas');
            }

            if (Auth::user()->role_id == 3) {
                return redirect('/');
            }
        }

        Session::flash('status', 'Gagal');
        Session::flash('message', 'Login tidak valid');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'name' => 'required|max:255',
            'address' => 'required',
        ]);

        $request['password']=Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Daftar berhasil. Tunggu admin untuk konfirmasi!');
        return redirect('register');
    }

}
