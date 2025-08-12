<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.edit', ['admin' => User::find(1)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        $rules = [
            'name' => 'required|max:200',
            'password' => 'required|max:20'
        ];

        if ($admin->email != $request->email) {
            $rules['email'] = 'required|max:100|email:dns|unique:admin|unique:members';
        }

        $validated = $request->validate($rules);

        $admin->update($validated);

        return redirect('/edit-admin')->with('success', 'Data admin berhasil diupdate');
    }

    
}
