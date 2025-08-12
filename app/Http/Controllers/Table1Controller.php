<?php

namespace App\Http\Controllers;

use App\Models\Table1;
use App\Models\Table2;
use App\Models\Table3;
use App\Models\Table4;
use App\Models\Table5;
use App\Models\Table6;
use Illuminate\Http\Request;

use illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;

use Codedge\Fpdf\Fpdf\Fpdf;

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

    public function cetakPdf(Request $request) {

        // $data = Table1::with('member')->whereBetween('')

        // $data = Table1::with(['member', function($query) {
        //     $query->select('id','nama_lengkap');
        // }])
        // ->get([
        //     'id',
        //     'waktu_mulai', 
        //     'waktu_akhir', 
        //     'harga', 
        //     'status_pembayaran',
        //     'member_id' 
        // ]);

        $data1 = Table1::select('waktu_mulai', 
            'waktu_akhir', 
            'harga', 
            'member_id',
            'status_pembayaran')->whereBetween('waktu_mulai', [$request->tanggal_awal, $request->tanggal_akhir])->with(['member:id,nama_lengkap,no_wa'])->get();

        $data2 = Table2::select('waktu_mulai', 
            'waktu_akhir', 
            'harga', 
            'member_id',
            'status_pembayaran')->whereBetween('waktu_mulai', [$request->tanggal_awal, $request->tanggal_akhir])->with(['member:id,nama_lengkap,no_wa'])->get();


        $data3 = Table3::select('waktu_mulai', 
            'waktu_akhir', 
            'harga', 
            'member_id',
            'status_pembayaran')->whereBetween('waktu_mulai', [$request->tanggal_awal, $request->tanggal_akhir])->with(['member:id,nama_lengkap,no_wa'])->get();

        $data4 = Table4::select('waktu_mulai', 
            'waktu_akhir', 
            'harga', 
            'member_id',
            'status_pembayaran')->whereBetween('waktu_mulai', [$request->tanggal_awal, $request->tanggal_akhir])->with(['member:id,nama_lengkap,no_wa'])->get();
        
        $data5 = Table5::select('waktu_mulai', 
            'waktu_akhir', 
            'harga', 
            'member_id',
            'status_pembayaran')->whereBetween('waktu_mulai', [$request->tanggal_awal, $request->tanggal_akhir])->with(['member:id,nama_lengkap,no_wa'])->get();
        
        $data6 = Table6::select('waktu_mulai', 
            'waktu_akhir', 
            'harga', 
            'member_id',
            'status_pembayaran')->whereBetween('waktu_mulai', [$request->tanggal_awal, $request->tanggal_akhir])->with(['member:id,nama_lengkap,no_wa'])->get();

        $mergeData = $data1->concat($data2)
                    ->concat($data3)
                    ->concat($data4)
                    ->concat($data5)
                    ->concat($data6);
        

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('Arial', 'B', 12);

        // Header
        $pdf->Cell(0, 5, 'LAPANGAN FUTSAL GOLDEN', 0, 1, 'C');
        $pdf->Cell(0, 5, 'JAMBI', 0, 1, 'C');

        
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 5, 'Kenali Besar, Kec. Kota Baru, Kota Jambi, Jambi 36361', 0, 1, 'C');
        $pdf->Cell(0, 5, 'Periode ' . date('d-m-Y', strtotime($request->tanggal_awal)) . ' - ' . date('d-m-Y', strtotime($request->tanggal_akhir)), 0, 1, 'C');
       
        $pdf->Line(10, $pdf->GetY() + 2, 200, $pdf->GetY() + 2);
        $pdf->Ln(5);
        // Header tabel
        $pdf->Cell(10, 10, 'No', 1);
        $pdf->Cell(30, 10, 'Nama Customer', 1);
        $pdf->Cell(20, 10, 'Meja', 1);
        $pdf->Cell(25, 10, 'Waktu Mulai', 1);
        $pdf->Cell(25, 10, 'Waktu Akhir', 1);
        $pdf->Cell(25, 10, 'Nomor WA', 1);
        $pdf->Cell(30, 10, 'Status Bayar', 1);
        $pdf->Cell(25, 10, 'Harga', 1);
        $pdf->Ln();

        // Data tabel
        $pdf->SetFont('Arial', '', 7);

        foreach($mergeData as $index => $row) {
            $no = $index + 1;
            $nama = $row->member->nama_lengkap;
            $meja = '';

            if ($row->getTable() === 'table1s') {
                $meja = 'Meja 1';
            } else if ($row->getTable() === 'table2s') {
                $meja = 'Meja 2';
            } else if ($row->getTable() === 'table3s') { 
                $meja = 'Meja 3';
            } else if ($row->getTable() === 'table4s') { 
                $meja = 'Meja 4';
            } else if ($row->getTable() === 'table5s') { 
                $meja = 'Meja 5';
            } else if ($row->getTable() === 'table6s') { 
                $meja = 'Meja 6';
            }

            // $waktu_mulai = date('d-m-Y (H:i)', );
            $waktu_mulai = date('d-m-Y (H:i)', strtotime($row->waktu_mulai));
            $waktu_akhir = date('d-m-Y (H:i)', strtotime($row->waktu_akhir));
            // $waktu_akhir = $row->waktu_akhir;
            $no_wa = $row->member->no_wa;
            $status_bayar = $row->status_pembayaran;
            $harga = 35000;

            $pdf->cell(10, 10, $no, 1);
            $pdf->cell(30, 10, $nama, 1);
            $pdf->cell(20, 10, $meja, 1);
            $pdf->cell(25, 10, $waktu_mulai, 1);
            $pdf->cell(25, 10, $waktu_akhir, 1);
            $pdf->cell(25, 10, $no_wa, 1);
            $pdf->cell(30, 10, $status_bayar, 1);
            $pdf->cell(25, 10, $harga, 1);
            $pdf->Ln();
        }

        $pdf->Output();
        exit;
                
    }
}
