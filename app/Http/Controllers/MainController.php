<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view('home.index', [
            "title" => "Home",
        ]);
    }

    public function laporan(){
        return view('laporan.index', [
            "title" => "Laporan",
        ]);
    }
}
