<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Simpanan(){
        return $this->hasOne(Simpanan::class);
    }

    public function Peminjaman(){
        return $this->hasOne(Peminjaman::class);
    }
}
