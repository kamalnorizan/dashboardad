<?php

namespace App\Http\Controllers;

use App\Organisasi;
use App\Laporan;
use App\Jawatankuasa;
use App\User;
use App\Kategoriaudit;
use App\Attachment;
use Carbon\Carbon;
// use Input;
use Auth;
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
        $reports = Laporan::where('auditor',Auth::user()->id)->whereIn('status',['draft','pindaan','gugur'])->get();
        return view('laporan.index',compact('reports'));
    }

    public function ajaxlaporan()
    {
        $reports = Laporan::where('auditor',Auth::user()->id)->whereIn('status',['draft','pindaan','gugur'])->get();
        $i=0;
        return datatables()->of($reports)
            ->addColumn('no_bil', function($report){
                $no_bil = $report->id;
                return $no_bil;
            })
            ->addColumn('tajuk', function($report){
                $tajuk = $report->tajuk;
                return $tajuk;
            })
            ->addColumn('tarikh', function($report){

                $tarikh =  Carbon::parse($report->tarikh)->format('d-m-Y');
                return $tarikh;
            })
            ->addColumn('kategori', function($report){

                $kategori =  $report->kategoriaudit->name;
                return $kategori;
            })
            ->addColumn('status', function($report){

                return $report->status;
            })
            ->addColumn('tindakan', function($report){
                $buttons = '<a class="btn btn-xs btn-primary" href="'.route('penemuan.index',['laporan'=>$report->id]).'"><i class="fa fa-edit"></i></a>';
                return $buttons;
            })
            ->rawColumns(['no_bil','tajuk','tarikh','kategori','status','tindakan'])
            ->make(true);
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

        $kcad = User::role('kcad')->first();
        $laporan = new Laporan();
        $laporan->tajuk = $request->tajuk_laporan;
        $laporan->tarikh = $request->tarikh_laporan;
        $laporan->tahun = $request->tahun;
        $laporan->auditor = Auth::user()->id;
        $laporan->kcad = $kcad->id;
        $laporan->organisasi_id = $request->organisasi_id;
        if(isset($request->subkategori)){
            $laporan->kategori_id = $request->subkategori;
        }else{
            $laporan->kategori_id = $request->kategori;
        }
        $laporan->save();

        foreach ($request->jawatankuasa as $key => $value) {
            $jawatankuasa  = new Jawatankuasa();
            $jawatankuasa->laporan_id = $laporan->id;
            $jawatankuasa->user_id = $value;
            if($value==$kcad->id ){
                $jawatankuasa->posisi = 'kcad';
            }else{
                $jawatankuasa->posisi = 'auditor';
            }
            $jawatankuasa->save();
        }

        if($file = $request->file('attachment')){
            $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $attachment = new Attachment;
            $attachment->title = $name;
            $attachment->url = $fileName;
            $laporan->attachment()->save($attachment);
        }

        return redirect()->route('penemuan.index',['laporan'=>$laporan->id]);

    }

    public function auditorhantarlaporan(Request $request)
    {
        $laporan = Laporan::find($request->laporan_id);
        $laporan->status = 'semakan kcad';
        $laporan->save();
        flash('Laporan telah dihantar kepada KCAD untuk semakan')->success()->important();
        return redirect('/laporan');
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
