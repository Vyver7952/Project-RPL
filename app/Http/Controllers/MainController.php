<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Peminjaman;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home()
    {
        $chartArea = Simpanan::select(DB::raw("SUM(SUM(saldo)) OVER (ORDER BY MONTH(created_at)) as jumlah"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('jumlah', 'month_name');

        $labelA = $chartArea->keys();
        $dataA = $chartArea->values();

        return view('home.index', [
            "title" => "Home",
            "nasabah" => Nasabah::count('id'),
            "peminjaman" => Peminjaman::sum('nominal'),
            "simpanan" => Simpanan::sum('saldo'),
            "labelA" => $labelA,
            "dataA" => $dataA,
            "dataPeminjaman" => Peminjaman::count('id'),
            "dataSimpanan" => Simpanan::count('id')
        ]);
    }

    public function laporan()
    {
        return view('laporan.index', [
            "title" => "Laporan",
        ]);
    }
}
