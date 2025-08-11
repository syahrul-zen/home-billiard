<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
