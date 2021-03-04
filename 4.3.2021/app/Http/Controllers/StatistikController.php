<?php

namespace App\Http\Controllers;

use App\Statistik;
use App\Auditipenemuan;
use App\Jawatankuasa;
use App\Laporan;
use App\Kategoriaudit;
use App\User;
use App\Progress;
use App\Penemuan;
use Auth;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistik = Laporan::orderBy('id','desc')->paginate(10);
        return view('statistik.index',compact('statistik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Laporan $laporan)
    {
        $kcad = Penemuan::where('laporan_id', $laporan->id)->whereIn('progress_id',['1','3','4','5','8'])->paginate(20);


        // dd($kcad);
        return view('statistik.indexpenemuan',compact('laporan','kcad'));
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
     * @param  \App\Statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function show(Statistik $statistik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistik $statistik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistik $statistik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistik $statistik)
    {
        //
    }
}
