<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class SyLoginController extends Controller
{
    public function __construct()
    {
        
    }
    public function loginSy(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // simpan data user ke session
            Session::put('nama_user', $user->nama_user);
            Session::put('role', $user->role);

            // flash message
            session()->flash('success', 'Login berhasil! Selamat datang, ' . $user->nama_user);
            // langsung redirect ke dashboard umum
            return redirect()->route('user.page.dashboard');
        }
    }

    function logoutSy()
    {
        Session::flush(); // hapus semua session
        Auth::logout();
        return redirect()->route('page.login')->with('success', 'Anda berhasil logout.');
    }
}