<?php

namespace App\Http\Controllers;

use App\Ulasanpenemuan;
use App\Laporan;
use App\Jawatankuasa;
use App\User;
use App\Organisasi;
use App\Penemuan;
use Auth;
use Illuminate\Http\Request;

class UlasanpenemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kcad = Laporan::where('status','kcad')->orderBy('id','desc')->paginate(20);
        return view('kcad.index', compact('kcad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Laporan $laporan)
    {
        // $findings = $laporan->findings;
        // $kcad = Laporan::orderBy('id','desc')->paginate(20);
        $kcad = Penemuan::where('laporan_id', $laporan->id)->whereIn('progress_id',['1','3','4','8'])->paginate(20);

        // dd($kcad);
        return view('kcad.create',compact('laporan','kcad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'ulasan'         => 'required',
            'auditor'     => 'required',
            'progress_id'  => 'required',
            'kcad'     => 'required',
            'penemuan_id'     => 'required',
         ]);

        Ulasanpenemuan::create($request->all());

        flash('Semakan Penemuan telah berjaya direkodkan')->success()->important();
        return redirect('kcad');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ulasanpenemuan  $ulasanpenemuan
     * @return \Illuminate\Http\Response
     */
    public function show(Ulasanpenemuan $ulasanpenemuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ulasanpenemuan  $ulasanpenemuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ulasanpenemuan $ulasanpenemuan, Laporan $laporan)
    {
        // $findings = $laporan->findings;
        // // $jawatankuasa2 = Penemuan::orderBy('id','desc')->paginate(20);
        // $kcad = Laporan::orderBy('id','desc')->paginate(20);
        // return view ('kcad.edit' ,compact('laporan','findings','kcad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ulasanpenemuan  $ulasanpenemuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ulasanpenemuan $ulasanpenemuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ulasanpenemuan  $ulasanpenemuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ulasanpenemuan $ulasanpenemuan)
    {
        //
    }
}
