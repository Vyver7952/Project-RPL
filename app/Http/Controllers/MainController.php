<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Peminjaman;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view('home.index', [
            "title" => "Home",
            "nasabah" => Nasabah::count('id'),
            "peminjaman" => Peminjaman::sum('nominal'),
            "simpanan" => Simpanan::sum('saldo')
        ]);
    }

    public function laporan(){
        return view('laporan.index', [
            "title" => "Laporan",
        ]);
    }
}
