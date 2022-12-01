<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Peminjaman;
use App\Models\SetorCicilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetorCicilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $result = Nasabah::has('peminjaman')->orderBy('id')->get();

        return view('peminjaman.setor', [
            "title" => "Setor Peminjaman",
            "idpeminjaman" => $next_id,
            "nasabah" => $result
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        // $id = DB::select("SHOW TABLE STATUS LIKE 'peminjamen'");
        // $next_id = $id[0]->Auto_increment;
        // $result = Nasabah::has('peminjaman')->orderBy('id')->get();

        return $peminjaman;
        // return view('peminjaman.setor', [
        //     "title" => "Setor Peminjaman",
        //     "peminjaman" => $peminjaman
        //     // "idpeminjaman" => $next_id,
        //     // "nasabah" => $result
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
