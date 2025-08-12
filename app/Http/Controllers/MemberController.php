<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Member;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('Admin.Member.index', [
            'members' => $members
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $member = Auth::guard('member')->user();

        $total= 0;

        $member->load('historyTable1',
            'historyTable2',
            'historyTable3',
            'historyTable4',
            'historyTable5',
            'historyTable6'
        );

        $total+= $member->historyTable1->count();
        $total+= $member->historyTable2->count();
        $total+= $member->historyTable3->count();
        $total+= $member->historyTable4->count();
        $total+= $member->historyTable5->count();
        $total+= $member->historyTable6->count();

        // Dapatakan semua history booking dari semua tabel :
        $allHistory = $member->historyTable1
            ->concat($member->historyTable2)
            ->concat($member->historyTable3)
            ->concat($member->historyTable4)
            ->concat($member->historyTable5)
            ->concat($member->historyTable6);

        // Sortir berdasarkan waktu mulai
        $allHistory = $allHistory->sortBy('created_at');

        return view('Member.profile', [
            'member' => $member, 
            'totalBermain' => $total, 
            'allHistory' => $allHistory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('Admin.Member.edit', [
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $rules = [
            'nama_lengkap' => 'required|max:200', 
            'alamat' => 'required|max:200',  
            'foto' => 'max:2000',  
            'password' => 'required|max:20'
        ];


        if ($member->email != $request->email) {
            $rules['email'] = 'required|max:100|email:dns|unique:admin|unique:members';
        }

        if ($member->no_wa != $request->no_wa) {
            $rules['no_wa'] = 'required|max:20|unique:members';
        }

        $validated = $request->validate($rules);

        $validated['password'] = bcrypt($validated['password']);

        $foto = $request->file('foto');

        if ($foto) {
            $rename = uniqid() . '_' . $foto->getClientOriginalName();
            $validated['foto'] = $rename;
            $locationFile = 'file';
            $foto->move($locationFile, $rename);

            File::delete($locationFile . '/' . $member->foto);
        }

        $member->update($validated);

        return redirect('/member')->with('success', 'Data member berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        File::delete('file/' . $member->foto);
        $member->delete();

        return redirect('/member')->with('success', 'Data member berhasil dihapus');
    }
}
