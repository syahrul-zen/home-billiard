<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

use illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register() {
        return view('Member.register');
    }

    public function createMember(Request $request) {
        
        $validated = $request->validate([
            'nama_lengkap' => 'required|max:200', 
            'alamat' => 'required|max:200', 
            'no_wa' => 'required|max:20|unique:members', 
            'foto' => 'required|max:2000', 
            'email' => 'required|max:100|email:dns|unique:admin|unique:members', 
            'password' => 'required|max:20'
        ]);

        $foto = $request->file('foto');

        $rename = uniqid() . '_' . $foto->getClientOriginalName();

        $validated['foto'] = $rename;

        $validated['password'] = bcrypt($validated['password']);

        Member::create($validated);

        $locationFile = 'file';

        $foto->move($locationFile, $rename);

        return redirect('/login')->with('success', 'Berhasil registrasi dengan email ' . $validated['email'] . ', silahkan login');
        
    }

    public function login() {

        if (Auth::guard('admin')->check()) {
            return redirect('/dashboard');
        }

        if (Auth::guard('member')->check()) {
            return redirect('/');
        }

        return view('Auth.login');  
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns', 
            'password' => 'required|max:20'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Berhasil login sebagai admin');
        }

        if (Auth::guard('member')->attempt($credentials)) {
            return redirect('/')->with('success', 'Berhasil login sebagai member');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout() {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else {
            Auth::guard('member')->logout();
        }

        // lalu redirect ke login : 
        return redirect('login');
    }
}
