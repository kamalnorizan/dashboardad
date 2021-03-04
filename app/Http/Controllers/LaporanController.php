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
use Mail;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Laporan::where('auditor',Auth::user()->id)->where('status','auditor')->get();
        $kategoriAudit = Kategoriaudit::pluck('name','id');
        return view('laporan.index',compact('reports','kategoriAudit'));
    }

    public function ajaxlaporan()
    {
        $reports = Laporan::where('auditor',Auth::user()->id)->where('status','auditor')->get();
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

                $buttons='';
                $buttons .= '<a class="btn btn-xs btn-success" href="'.route('laporan.edit',['laporan'=>$report->id]).'"><i class="fa fa-edit">Edit Laporan</i></a> ';
                if($report->status == 'auditor' ){

                        $buttons .= '<a class="btn btn-xs btn-primary" href="'.route('penemuan.index',['laporan'=>$report->id]).'"><i class="fa fa-edit">Penemuan</i></a> ';

                    }


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
    public function create(Laporan $laporan)
    {
        $kategori_opts = Kategoriaudit::whereNull('subkategori')->pluck('name','id');
        $kategori_opts[0] = 'Sila Pilih Kategori';
        $org_Opts = Organisasi::pluck('name','id');
        $jawatankuasa_opts = User::role(['auditor','kcad'])->pluck('name','id');
        return view('laporan.create',compact('laporan','org_Opts','kategori_opts','jawatankuasa_opts'));
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
        $laporan->status = 'auditor';
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
            $attachment->url = 'uploads/'.$fileName;
            $laporan->attachment()->save($attachment);
        }

        return redirect()->route('penemuan.index',['laporan'=>$laporan->id]);

    }

    public function edit(Laporan $laporan)
    {

        $kategori_opts = Kategoriaudit::whereNull('subkategori')->pluck('name','id');
        $kategori_opts[0] = 'Sila Pilih Kategori';
        // dd($laporan->kategoriaudit->parentkategori);
        if($laporan->kategoriaudit->parentkategori==''){
            $selectedkategori = $laporan->kategoriaudit;
            $selectedsubkategori = '';
            $subkategori_opts=[];
        }else{
            $selectedkategori = $laporan->kategoriaudit->parentkategori;
            $selectedsubkategori = $laporan->kategoriaudit;
            $subkategori_opts=$laporan->kategoriaudit->parentkategori->subkategoriad->pluck('name','id');
        }
        $org_Opts = Organisasi::pluck('name','id');
        $jawatankuasa_opts = User::role(['auditor','kcad'])->pluck('name','id');
        return view('laporan.edit',compact('laporan','org_Opts','kategori_opts','jawatankuasa_opts','selectedkategori','selectedsubkategori','subkategori_opts'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $kcad = User::role('kcad')->first();
        $laporan->tajuk = $request->tajuk;
        $laporan->tarikh = Carbon::parse($request->tarikh)->format('Y-m-d');
        $laporan->tahun = $request->tahun;
        //$laporan->auditor = Auth::user()->id;
        //$laporan->kcad = $kcad->id;
        $laporan->status = 'auditor';
        $laporan->organisasi_id = $request->organisasi_id;
        if(isset($request->subkategori)){
            $laporan->kategori_id = $request->subkategori;
        }else{
            $laporan->kategori_id = $request->kategori;
        }
        $laporan->save();



        if( $laporan->status !='jawatankuasa'){
            foreach($laporan->jawatankuasa as $jawatankuasa){
                $jawatankuasa->delete();
            }
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

        }

        $laporan->fill($request->except('attachment'));
        if($file = $request->hasFile('attachment')){
            $laporan -> attachment ->delete();
            $file = $request->file('attachment') ;
            $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $attachment = new Attachment;
            $attachment->title = $name;
            $attachment->url = 'uploads/'.$fileName;
            $attachment->attachable_id = $laporan->id;
            $attachment->attachable_type = 'App\Laporan';
            $laporan->attachment()->save($attachment);

        }

        //$laporan->update($request->all());

        flash('Kemaskini maklumat Laporan Audit telah berjaya.')->success()->important();
        return redirect()->route('laporan.index',['laporan'=>$laporan->id]);
    }

    public function show(Laporan $laporan)

    {
        $kategori_opts = Kategoriaudit::whereNull('subkategori')->pluck('name','id');
        $kategori_opts[0] = 'Sila Pilih Kategori';
        // dd($laporan->kategoriaudit->parentkategori);
        if($laporan->kategoriaudit->parentkategori==''){
            $selectedkategori = $laporan->kategoriaudit;
            $selectedsubkategori = '';
            $subkategori_opts=[];
        }else{
            $selectedkategori = $laporan->kategoriaudit->parentkategori;
            $selectedsubkategori = $laporan->kategoriaudit;
            $subkategori_opts=$laporan->kategoriaudit->parentkategori->subkategoriad->pluck('name','id');
        }
        $org_Opts = Organisasi::pluck('name','id');
        $jawatankuasa_opts = User::role(['auditor','kcad'])->pluck('name','id');
        return view('laporan.show',compact('laporan','org_Opts','kategori_opts','jawatankuasa_opts','selectedkategori','selectedsubkategori','subkategori_opts'));

    }


    public function auditorhantarlaporan(Request $request)
    {
        $laporan = Laporan::find($request->laporan_id);
        $laporan->status = 'kcad';
        $laporan->save();

        $email = $laporan->kcaduser->email;
        $subject = $laporan->tajuk;
        Mail::send('penemuan.mailkcad', compact('laporan'), function ($message) use ($email,$subject) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->to($email, 'John Doe');
            $message->subject($subject);
            $message->priority(3);
        });

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
    public function getkategori()
    {
        $organisasi = Organisasi::all();

        $org_opts='<option selected value="">Sila pilih Auditi</option>';
        foreach ($organisasi as $key => $value) {
            $org_opts.='<option value="'.$value->id.'">'.$value->name.'</option>';
        }
        return $org_opts;
    }
}
