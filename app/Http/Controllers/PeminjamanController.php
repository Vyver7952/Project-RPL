<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Peminjaman;
use App\Models\SetorCicilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::orderby('tanggalPengajuan', 'desc')->paginate(10);

        return view('peminjaman.index', [
            "title" => "Peminjaman",
            "peminjaman" => $peminjaman
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = DB::select("SHOW TABLE STATUS LIKE 'peminjamen'");
        $next_id = $id[0]->Auto_increment;
        $result = Nasabah::doesntHave('peminjaman')->get();
        $time = [1, 3, 6, 8, 12];

        return view('peminjaman.create', [
            "title" => "Peminjaman",
            "idpeminjaman" => $next_id,
            "nasabah" => $result,
            "jangkaWaktu" => $time
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nasabah_id' => 'required',
            'nominal' => 'required|numeric',
            'jangkaWaktu' => 'required'
            // 'syaratPeminjaman' => 'required'
        ]);
        $validatedData['tanggalPengajuan'] = now();
        $validatedData['hasilKeputusan'] = false;

        Peminjaman::create($validatedData);

        return redirect('/peminjaman')->with('success', 'Peminjaman have been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        $transaksi = SetorCicilan::where('peminjaman_id', 'like', $peminjaman->id)
            ->paginate(5);

        return view('peminjaman.show', [
            "title" => "View Peminjaman",
            "peminjaman" => $peminjaman,
            "transaksi" => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        return view('peminjaman.edit', [
            "title" => "Edit Peminjaman",
            "peminjaman" => $peminjaman
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $rules = [
            'nasabah_id' => 'required',
            'nominal' => 'required',
            'tanggalPengajuan' => 'required',
            'jangkaWaktu' => 'required',
            'hasilKeputusan' => 'required|boolean'
        ];
        $validatedData = $request->validate($rules);

        Peminjaman::updateorCreate(['id' => $peminjaman->id], $validatedData);

        return redirect('/peminjaman')->with('success', "Peminjaman has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        Peminjaman::destroy($peminjaman->id);

        return redirect('/peminjaman')->with('success', "Peminjaman has been deleted!");
    }
}
