<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view('dashboard.index', [
            "title" => "Home",
            "logo" => "Logo.png"
        ]);
    }

    public function peminjaman(){
        return view('peminjaman.index', [
            "title" => "Peminjaman",
            "logo" => "Logo.png"
        ]);
    }

    public function simpanan(){
        return view('simpanan.index', [
            "title" => "Simpanan",
            "logo" => "Logo.png"
        ]);
    }

    public function laporan(){
        return view('laporan.index', [
            "title" => "Laporan",
            "logo" => "Logo.png"
        ]);
    }
}
