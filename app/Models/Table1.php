<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'waktu_mulai', 
        'waktu_akhir', 
        'kode_booking', 
        'harga', 
        'bukti_pembayaran', 
        'keterangan', 
        'status_booking', 
        'status_pembayaran', 
        'member_id'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}   
