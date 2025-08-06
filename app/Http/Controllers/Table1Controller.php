<?php

namespace App\Http\Controllers;

use App\Models\Table1;
use Illuminate\Http\Request;

use illuminate\Support\Facades\Auth;


class Table1Controller extends Controller
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
    public function show(Table1 $table1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table1 $table1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table1 $table1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table1 $table1)
    {
        //
    }

    public function showJadwal() {

        //  if(!Auth::guard('member')->check() && !Auth::guard('admin')->check()) {
        //     return redirect('/login')->with('error', 'You must be logged in to access this page.');
        // }

        // if (!Auth::guard('member')->check()) {
        //     return redirect('/login')->with('error', 'You must be logged in as a member to access this page.');
        // }

        $user = Auth::guard('member')->user();

        $tanggalSekarang = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));

        $dataTanggalSekarang = Table1::whereDate('waktu_mulai', '=', $tanggalSekarang->format('Y-m-d'))
            ->get();

        
        $jamMain = ['09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00', '18:00:00', '19:00:00', '20:00:00', '21:00:00', '22:00:00'];


        return view('Member.bTable1', [
            'user' => $user,
            'tanggalSekarang' => $tanggalSekarang,
            'dataTanggalSekarang' => $dataTanggalSekarang,
            'jamMain' => $jamMain
        ]);
    }

    public function showPembayaran($tanggal, $jam) {
        
        $user = Auth::guard('member')->user();

        $mergeTime = date('Y-m-d', strtotime($tanggal)) . ' ' . $jam;

        $checkData = Table1::where('waktu_mulai', '=', $mergeTime)->first();

        if ($checkData) {
            return redirect()->back()->with('error', 'Meja sudah dipesan pada waktu tersebut.');
        }

        $satuJamKedepan = date('Y-m-d H:i:s', strtotime($mergeTime . ' +1 hour'));

        return view('Member.pembayaran1', [
            'tanggal' => $tanggal,
            'jam' => $jam,
            'satuJamKedepan' => $satuJamKedepan,
            'user' => $user
        ]);

        // return $user;



        // $data = Table1::where('waktu_mulai', '=', $tanggal . ' ' . $jam)
        //     ->where('akun_id', '=', $user->id)
        //     ->first();

        // if (!$data) {
        //     return redirect()->back()->with('error', 'Data tidak ditemukan.');
        // }

        // return view('Member.pembayaran', [
        //     'data' => $data,
        //     'tanggal' => $tanggal,
        //     'jam' => $jam
        // ]);
    }
}
