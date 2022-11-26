<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\Nasabah;
use App\Models\TransaksiSimpanan;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simpanan = Simpanan::paginate(10);

        return view('simpanan.index', [
            "title" => "Simpanan",
            "simpanan" => $simpanan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('simpanan.create', [
            "title" => "Create Simpanan",
            "idsimpanan" => Simpanan::all()->count() + 1,
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
            'saldo' => 'required|numeric|min:5',
        ]);
        $validatedData['nominal'] = $validatedData['saldo'];

        if(!empty(Nasabah::find($validatedData['nasabah_id'])->simpanan->saldo)){
            $validatedData['saldo'] += Nasabah::find($validatedData['nasabah_id'])->simpanan->saldo;
            $validatedData['simpanan_id'] = Nasabah::find($validatedData['nasabah_id'])->simpanan->id;
        } else {
            $validatedData['simpanan_id'] = $request->idsimpanan;
        }
        $validatedData['status'] = "Setor";
        $validatedData['saldo_total'] = $validatedData['saldo'];

        Simpanan::updateorCreate(['nasabah_id' => $validatedData['nasabah_id']], $validatedData);
        TransaksiSimpanan::create($validatedData);

        return redirect('/simpanan')->with('success', "Simpanan has been created!");
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
        return view('simpanan.edit', [
            "title" => "Edit Simpanan",
            "simpanan" => $simpanan
        ]);
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
