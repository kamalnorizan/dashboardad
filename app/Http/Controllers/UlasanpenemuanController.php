<?php

namespace App\Http\Controllers;

use App\Ulasanpenemuan;
use App\Laporan;
use App\Jawatankuasa;
use App\User;
use App\Organisasi;
use App\Penemuan;
use App\Progress;
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
        $kcad = Penemuan::where('laporan_id', $laporan->id)->whereIn('progress_id',['1','3','4','5','8'])->paginate(20);

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
    public function show(Penemuan $penemuan)
    {
        $statusOpt = Progress::whereIn('name',['Lulus','Pindaan','Gugur'])->pluck('name','id');
        return view('kcad.semakan', compact('penemuan','statusOpt'));
    }

    public function semakanupdate(Request $request)
    {
        $penemuan = Penemuan::find($request->penemuan_id);
        $penemuan->progress_id = $request->status;
        if($request->status=='5'){
            foreach ($penemuan->auditipenemuan as $key => $auditipenemuan) {
                $auditipenemuan->status_jawatankuasa='4';
                $auditipenemuan->save();
            }
        }
        $penemuan->save();

        $ulasanpenemuan = new Ulasanpenemuan;
        $ulasanpenemuan->ulasan = $request->ulasan;
        $ulasanpenemuan->auditor = $penemuan->laporan->auditor;
        $ulasanpenemuan->kcad = Auth::user()->id;
        $ulasanpenemuan->penemuan_id = $penemuan->id;
        $ulasanpenemuan->progress_id = $request->status;
        $ulasanpenemuan->save();

        flash('Semakan status telah berjaya disimpan')->success()->important();
        return redirect('/kcad/create/'.$penemuan->laporan_id);

    }

    public function kcadhantarstatus(Request $request)
    {
        $laporan = Laporan::find($request->laporan_id);
        $laporan->status = 'auditor';
        $laporan->save();
        flash('Laporan telah berjaya dihantar kembali kepada Auditor')->success()->important();
        return redirect(route('kcad.index'));
    }

    public function kcadhantarjawatankuasa(Request $request)
    {
        $laporan = Laporan::find($request->laporan_id);
        $laporan->status = 'jawatankuasa';
        $laporan->save();
        flash('Laporan telah berjaya dihantar kembali kepada Auditi')->success()->important();
        return redirect(route('kcad.index'));
    }
}
