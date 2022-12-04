<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function nasabah(){
        return $this->belongsTo(Nasabah::class);
    }

    public function transaksisimpanan(){
        return $this->belongsToMany(TransaksiSimpanan::class);
    }

    public function scopeSearch($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search) {
            return $query->where('nasabah_id', 'like', '%' . $search . '%');
        });

        $query->when($filter['nasabah'] ?? false, fn($query, $nasabah) =>
            $query->whereHas('nasabah', fn($query) =>
                $query->where('nama', $nasabah)
            )
        );
    }
}
