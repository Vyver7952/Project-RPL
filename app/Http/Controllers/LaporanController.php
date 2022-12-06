<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporan()
    {
        $time = [1, 3, 6, 8, 12];

        return view('laporan.index', [
            "title" => "Laporan",
            "waktu" => $time
        ]);
    }

    public function tampilLaporan(Request $request)
    {
        $validatedData = $request->validate([
            "jangkaWaktu" => "required"
        ]);

        if ($validatedData['jangkaWaktu'] == 1) {
            $month = now()->month;
            $start = now()->startOfMonth();
            $jumlahSimpanan = Simpanan::whereMonth('created_at', $month)->count();
            $totalSimpanan = Simpanan::whereMonth('created_at', $month)->sum('saldo');
            $jumlahPeminjaman = Peminjaman::whereMonth('created_at', $month)->count();
            $totalPeminjaman = Peminjaman::whereMonth('created_at', $month)->sum('nominal');
        } else {
            $monthS = now()->subMonths($validatedData['jangkaWaktu'] - 1)->month;
            $monthE = now()->month;
            $start = now()->startOfMonth()->subMonths($validatedData['jangkaWaktu'] - 1);
            $end = now()->startOfMonth();
            $jumlahSimpanan = Simpanan::whereBetween(DB::raw('MONTH(created_at)'), [$monthS, $monthE])->count();
            $totalSimpanan = Simpanan::whereBetween(DB::raw('MONTH(created_at)'), [$monthS, $monthE])->sum('saldo');
            $jumlahPeminjaman = Peminjaman::whereBetween(DB::raw('MONTH(created_at)'), [$monthS, $monthE])->count();
            $totalPeminjaman = Peminjaman::whereBetween(DB::raw('MONTH(created_at)'), [$monthS, $monthE])->sum('nominal');
        }

        if (empty($end)) {
            $pdf = Pdf::loadView('laporan.view', [
                "title" => "Laporan",
                "jumlahSimpanan" => $jumlahSimpanan,
                "jumlahPeminjaman" => $jumlahPeminjaman,
                "totalSimpanan" => $totalSimpanan,
                "totalPeminjaman" => $totalPeminjaman,
                "start" => $start,
            ]);
            return $pdf->download("Laporan.pdf");
        } else {
            $pdf = Pdf::loadView('laporan.view', [
                "title" => "Laporan",
                "jumlahSimpanan" => $jumlahSimpanan,
                "jumlahPeminjaman" => $jumlahPeminjaman,
                "totalSimpanan" => $totalSimpanan,
                "totalPeminjaman" => $totalPeminjaman,
                "start" => $start,
                "end" => $end
            ]);
            return $pdf->download("Laporan.pdf");
        }
    }
}
