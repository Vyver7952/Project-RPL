<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function simpanan(){
        return $this->hasOne(Simpanan::class);
    }

    public function peminjaman(){
        return $this->hasOne(Peminjaman::class);
    }

    public function transaksisimpanan(){
        return $this->belongsToMany(TransaksiSimpanan::class);
    }

    public function setorcicilan(){
        return $this->belongsToMany(SetorCicilan::class);
    }

    public function scopeSearch($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });
    }
}
