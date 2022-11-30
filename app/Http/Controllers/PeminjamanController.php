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
        $peminjaman = Peminjaman::paginate(10);

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

        return view('peminjaman.create', [
            "title" => "Peminjaman",
            "idpeminjaman" => $next_id,
            "nasabah" => Nasabah::all()
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
        //
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
        //
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
