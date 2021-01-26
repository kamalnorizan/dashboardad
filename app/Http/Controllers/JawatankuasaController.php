<?php

namespace App\Http\Controllers;

use App\Jawatankuasa;
use App\Laporan;
use App\Kategoriaudit;
use App\User;
use App\Progress;
use App\Penemuan;
use Auth;
use Illuminate\Http\Request;

class JawatankuasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jawatankuasa = Jawatankuasa::with('laporan.auditipenemuan')->where('user_id',Auth::user()->id)->paginate(20);
        return view('jawatankuasa.index',compact('jawatankuasa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Laporan $laporan)
    {
        $findings = $laporan->findings;
        $auditipenemuan = $laporan->auditipenemuan;
        // $jawatankuasa= Laporan::orderBy('id','desc')->paginate(20);

        return view ('jawatankuasa.create' ,compact('laporan','findings','auditipenemuan'));
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

        Ulasanjawatankuasa::create($request->all());

        flash('Semakan dan Ulasan Jawatankuasa telah berjaya direkodkan')->success()->important();
        return redirect('/jawatankuasa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jawatankuasa  $jawatankuasa
     * @return \Illuminate\Http\Response
     */
    public function show(Auditipenemuan $auditipenemuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jawatankuasa  $jawatankuasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Jawatankuasa $jawatankuasa, Laporan $laporan)
    {
        $findings = $laporan->findings;
        $jawatankuasa2 = Penemuan::orderBy('id','desc')->paginate(20);

        return view ('jawatankuasa.edit' ,compact('laporan','findings','jawatankuasa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jawatankuasa  $jawatankuasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jawatankuasa $jawatankuasa, Laporan $laporan)
    {
        $request->validate([
            'tajuk'     => 'required',
            'tarikh'    => 'required',

        ]);

        $laporan->update($request->all());

        flash('Semakan Jawatankuasa telah berjaya.')->success()->important();
        return redirect('laporan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jawatankuasa  $jawatankuasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jawatankuasa $jawatankuasa)
    {
        //
    }
}
