<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSimpanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function nasabah(){
        return $this->belongsToMany(Nasabah::class);
    }

    public function simpanan(){
        return $this->belongsToMany(Simpanan::class);
    }
}
