<?php

namespace App\Http\Controllers;

use App\Maklumbalas;
use App\Laporan;
use App\Penemuan;
use Auth;
use Illuminate\Http\Request;

class MaklumbalasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maklumbalas = Laporan::orderBy('id','desc')->paginate(20);
        return view('maklumbalas.index',compact('maklumbalas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Laporan $laporan)
    {
        $findings = $laporan->findings;
        $maklumbalas = Laporan::orderBy('id','desc')->paginate(20);
        return view('maklumbalas.create',compact('laporan','findings','maklumbalas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/maklumbalas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maklumbalas  $maklumbalas
     * @return \Illuminate\Http\Response
     */
    public function show(Maklumbalas $maklumbalas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maklumbalas  $maklumbalas
     * @return \Illuminate\Http\Response
     */
    public function edit(Maklumbalas $maklumbalas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maklumbalas  $maklumbalas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maklumbalas $maklumbalas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maklumbalas  $maklumbalas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maklumbalas $maklumbalas)
    {
        //
    }
}
