<?php

namespace App\Http\Controllers;

use App\Organisasi;
use App\Laporan;
use App\User;
use App\Kategoriaudit;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_opts = Kategoriaudit::whereNull('subkategori')->pluck('name','id');
        $kategori_opts[0] = 'Sila Pilih Kategori';
        $org_Opts = Organisasi::pluck('name','id');
        $jawatankuasa_opts = User::role(['auditor','kcad'])->pluck('name','id');
        return view('laporan.create',compact('org_Opts','kategori_opts','jawatankuasa_opts'));
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
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }

    public function getSubkategori(Kategoriaudit $kategori)
    {
        $subkategori = Kategoriaudit::where('subkategori',$kategori->id)->get();

        return $subkategori;
    }

    public function getJawatankuasa()
    {
        $jawatankuasa = User::role(['auditor','kcad'])->get();
        return $jawatankuasa;
    }
}
