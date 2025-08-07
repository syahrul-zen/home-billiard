<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap', 
        'alamat', 
        'no_wa', 
        'foto', 
        'status', 
        'email', 
        'password'
    ];

    public function historyTable1()
    {
        return $this->hasMany(Table1::class);
    }

    public function historyTable2()
    {
        return $this->hasMany(Table2::class);
    }

    public function historyTable3()
    {
        return $this->hasMany(Table3::class);
    }

    public function historyTable4()
    {
        return $this->hasMany(Table4::class);
    }

    public function historyTable5()
    {
        return $this->hasMany(Table5::class);
    }

    public function historyTable6()
    {
        return $this->hasMany(Table6::class);
    }

    

}
