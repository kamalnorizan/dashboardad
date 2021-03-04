<?php

namespace App\Http\Controllers;

use App\Jawatankuasa;
use App\Laporan;
use App\Kategoriaudit;
use App\User;
use App\Progress;
use App\Penemuan;
use App\Auditipenemuan;
use App\Maklumbalas;
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
        $auditipenemuan = $laporan->auditipenemuan->where('status_jawatankuasa','!=','4');
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
        $maklumbalas= Maklumbalas::find($request->maklumbalas_id);
        $maklumbalas->progress_id=$request->status;
        $maklumbalas->ulasan=$request->ulasan;
        $jawatankuasa=$maklumbalas->auditipenemuan->laporan->jawatankuasa->where('user_id',Auth::user()->id)->first();
        $maklumbalas->jawatankuasa_id=$jawatankuasa->id;
        $maklumbalas->save();

        $auditipenemuan = $maklumbalas->auditipenemuan;
        $auditipenemuan->progress_id = $request->status;
        $auditipenemuan->status_jawatankuasa = 2;
        $auditipenemuan->save();

        $laporan_id = $maklumbalas->auditipenemuan->laporan_id;
        flash('Telah berjaya di rekodkan')->success()->important();
        return redirect('/jawatankuasa/create/'.$laporan_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jawatankuasa  $jawatankuasa
     * @return \Illuminate\Http\Response
     */
    public function show(Auditipenemuan $auditipenemuan)
    {
        $statusOpt = Progress::whereIn('id',['7','9','10'])->pluck('name','id');
        $ulasan = $auditipenemuan->maklumbalas->sortByDesc('id')->first();
        return view('jawatankuasa.show',compact('auditipenemuan','statusOpt','ulasan'));
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

    public function jawatankuasahantarauditi(Request $request)
    {
        $laporan = Laporan::find($request->laporan_id);
        // dd($laporan);

        foreach ($laporan->auditipenemuan as $key => $auditipenemuan) {
            $auditipenemuan->status_hantar = 'auditi';
            $auditipenemuan->save();
        }

        flash('Setiap ulasan telah dihantar kepada auditi untuk tindakan')->success()->important();
        return redirect('/jawatankuasa');
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
