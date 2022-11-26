<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetorCicilan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function nasabah(){
        return $this->belongsToMany(Nasabah::class);
    }

    public function peminjaman(){
        return $this->belongsToMany(Peminjaman::class);
    }
}
