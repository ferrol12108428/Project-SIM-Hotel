<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $credentials = Auth::user();
            if (Auth::user()->role == 'Staff' || Auth::user()->role == 'Admin') {
                return redirect()->route('dashboard')->with('Success', 'Anda Berhasil Log In!');
            }
        }
        return redirect()->back()->with('Error', 'Anda Gagal Log In!');
    }
}
