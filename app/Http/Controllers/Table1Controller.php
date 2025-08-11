<?php

namespace App\Http\Controllers;

use App\Models\Table1;
use Illuminate\Http\Request;

use illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;

class Table1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Table1.index', [
            'bookings' => Table1::with('member')->orderBy('waktu_mulai', 'DESC')->get()
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
        $validated = $request->validate([
            'member_id' => 'required', 
            'waktu_mulai' => 'required', 
            'waktu_akhir' => 'required', 
            'keterangan' => 'max:240', 
            'harga' => 'required', 
            'bukti_pembayaran' => 'required|max:2000'
        ]);

        $file = $request->file('bukti_pembayaran');

        $rename = uniqid() . '_' . $file->getClientOriginalName();

        $validated['bukti_pembayaran'] = $rename;

        Table1::create($validated);

        $locationFile = 'file';

        $file->move($locationFile, $rename);

        return redirect('/booking-table1')->with('success', 'Booking berhasil dilakukan. silahkan tunggu konfirmasi dari admin.');

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

        return view('Admin.Table1.edit', [
            'booking' => $table1
        ]);
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
        File::delete('file/' . $table1->bukti_pembayaran);

         $table1->delete();

        return redirect('/table1')->with('success', 'Data booking berhasil dihapus.');
    }

    public function showJadwal() {

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

        $satuJamKedepan = date('Y-m-d H:i   ', strtotime($mergeTime . ' +1 hour'));

        return view('Member.pembayaran1', [
            'tanggal' => $tanggal,
            'waktuAwal' => $mergeTime,
            'waktuAkhir' => $satuJamKedepan,
            'user' => $user
        ]);
    }

    public function setStatusBooking(Table1 $table1, Request $request) {

        $status = $request->input('status_booked');

        $table1->status_booking = $status;

        $table1->save();

        return redirect()->back()->with('success', 'Status booking berhasil diperbarui.');
    }

    public function setStatusPembayaran(Table1 $table1, Request $request) {

        $status = $request->input('status_pembayaran');


        $table1->status_pembayaran = $status;

        $table1->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
