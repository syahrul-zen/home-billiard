<?php

namespace App\Http\Controllers;

use App\Models\Table6;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Table6Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Admin.Table6.index", [
            "bookings" => Table6::with('member')->orderBy('waktu_mulai', 'DESC')->get()
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

        Table6::create($validated);

        $locationFile = 'file';

        $file->move($locationFile, $rename);

        return redirect('/booking-table6')->with('success', 'Booking berhasil dilakukan. silahkan tunggu konfirmasi dari admin.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Table6 $table6)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table6 $table6)
    {
        return view("Admin.Table6.edit", [
            "booking" => $table6
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table6 $table6)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table6 $table6)
    {
        File::delete('file/' . $table6->bukti_pembayaran);
        $table6->delete();

        return redirect('/table6')->with('success', 'Data booking berhasil dihapus.');
    }

    public function showJadwal() {
        $user = Auth::guard('member')->user();
        $tanggalSekarang = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));

        $dataTanggalSekarang = Table6::whereDate('waktu_mulai', '=', $tanggalSekarang->format('Y-m-d'))
            ->get();

        $jamMain = ['09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00', '18:00:00', '19:00:00', '20:00:00', '21:00:00', '22:00:00'];

        return view('Member.bTable6', [
            'user' => $user,
            'tanggalSekarang' => $tanggalSekarang,
            'dataTanggalSekarang' => $dataTanggalSekarang,
            'jamMain' => $jamMain
        ]);
    }

    public function showPembayaran($tanggal, $jam) {

        $user = Auth::guard('member')->user();

        $mergeTime = date('Y-m-d', strtotime($tanggal)) . ' ' . $jam;

        $checkData = Table6::where('waktu_mulai', '=', $mergeTime)->first();

        if ($checkData) {
            return redirect()->back()->with('error', 'Meja sudah dipesan pada waktu tersebut.');
        }

        $satuJamKedepan = date('Y-m-d H:i', strtotime($mergeTime . ' +1 hour'));

        return view('Member.pembayaran6', [
            'tanggal' => $tanggal,
            'waktuAwal' => $mergeTime,
            'waktuAkhir' => $satuJamKedepan,
            'user' => $user
        ]);
    }

    public function setStatusBooking(Table6 $table6, Request $request) {

        $status = $request->input('status_booked');

        $table6->status_booking = $status;

        $table6->save();

        return redirect()->back()->with('success', 'Status booking berhasil diperbarui.');
    }

    public function setStatusPembayaran(Table6 $table6, Request $request) {

        $status = $request->input('status_pembayaran');


        $table6->status_pembayaran = $status;

        $table6->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }

}
