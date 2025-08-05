<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register() {
        return view('Member.register');
    }

    public function createMember(Request $request) {
        
        $validated = $request->validate([
            'nama_lengkap' => 'required|max:200', 
            'alamat' => 'required|max:200', 
            'no_wa' => 'required|max:20', 
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

        return "Berhasil Registrasi";


        
    }
}
