<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\Nasabah;
use App\Models\TransaksiSimpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('simpanan.index', [
            "title" => "Simpanan",
            "simpanan" => Simpanan::search(request(['search', 'nasabah']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = DB::select("SHOW TABLE STATUS LIKE 'simpanans'");
        $next_id = $id[0]->Auto_increment;

        return view('simpanan.create', [
            "title" => "Simpanan",
            "idsimpanan" => $next_id,
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
        $validatedData = $request->validate([
            'nasabah_id' => 'required',
            'saldo' => 'required|numeric|min:50000|max:2000000000',
            'status' => 'required'
        ]);

        $alert = "";
        $validatedData['nominal'] = $validatedData['saldo'];

        if (!empty(Nasabah::find($validatedData['nasabah_id'])->simpanan->saldo)) {
            $saldo = Nasabah::find($validatedData['nasabah_id'])->simpanan->saldo;
            $idsimpanan = Nasabah::find($validatedData['nasabah_id'])->simpanan->id;

            if ($validatedData['status'] == 'Setor') {
                $validatedData['saldo'] += $saldo;
            } else if ($validatedData['status'] == 'Tarik') {
                $validatedData['saldo'] = $saldo - $validatedData['saldo'];
            }
            $validatedData['simpanan_id'] = $idsimpanan;
            $alert = "Simpanan has been updated!";
        } else {
            if ($validatedData['status'] == "Setor") {
                $validatedData['simpanan_id'] = $request->idsimpanan;
                $alert = "Simpanan has been created!";
            } else {
                $alert = "Nasabah tidak memiliki simpanan";
                return redirect('/simpanan/create')->with('alert', $alert);
            }
        }
        $validatedData['saldo_total'] = $validatedData['saldo'];

        Simpanan::updateorCreate(['nasabah_id' => $validatedData['nasabah_id']], $validatedData);
        TransaksiSimpanan::create($validatedData);

        return redirect('/simpanan')->with('success', $alert);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function show(Simpanan $simpanan)
    {
        $transaksi = TransaksiSimpanan::where('simpanan_id', 'like', $simpanan->id)
            ->paginate(5);

        return view('simpanan.show', [
            "title" => "View Simpanan",
            "simpanan" => $simpanan,
            "transaksi" => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Simpanan $simpanan)
    {
        // return view('simpanan.edit', [
        //     "title" => "Edit Simpanan",
        //     "simpanan" => $simpanan
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Simpanan $simpanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simpanan $simpanan)
    {
        Simpanan::destroy($simpanan->id);

        return redirect('/simpanan')->with('success', "Simpanan has been deleted!");
    }
}
