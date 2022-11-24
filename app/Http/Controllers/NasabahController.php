<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nasabah = Nasabah::paginate(10);

        return view('nasabah.index', [
            "title" => "Nasabah",
            "nasabah" => $nasabah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function show(Nasabah $nasabah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function edit(Nasabah $nasabah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nasabah $nasabah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nasabah $nasabah)
    {
        //
    }
}
