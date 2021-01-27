<?php

namespace App\Http\Controllers;

use App\Maklumbalas;
use App\Laporan;
use App\Penemuan;
use App\Auditipenemuan;
use App\Attachment;
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
        // $maklumbalas = Laporan::orderBy('id','desc')->paginate(20);
        $laporan = Laporan::with(['auditipenemuan'=>function($q){
            $q->where('status_hantar','auditi')->where('auditi',Auth::user()->id);
        }],['findings'=>function($que){
            $que->where('progress_id','3');
        }])->where('status','jawatankuasa')->paginate(20);


        return view('maklumbalas.index',compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Laporan $laporan)
    {
        // $findings = $laporan->findings;
        // $maklumbalas = Laporan::orderBy('id','desc')->paginate(20);
        $laporan = Laporan::where('id',$laporan->id)->with(['auditipenemuan'=>function($q){
            $q->where('status_hantar','auditi')->where('auditi',Auth::user()->id)->whereIn('status_jawatankuasa',['0','1','2','3']);
        }],['findings'=>function($que){
            $que->where('progress_id','3');
        }])->where('status','jawatankuasa')->first();
        return view('maklumbalas.create',compact('laporan'));
    }

    public function edit(Auditipenemuan $auditipenemuan)
    {
        $penemuan = $auditipenemuan->penemuan;
        $maklumbalasterkini = $auditipenemuan->maklumbalas->sortByDesc('id')->first();
        $createmaklumbalas = true;
        if($maklumbalasterkini){
            if($maklumbalasterkini->progress_id=='10'){
                $createmaklumbalas = false;
            }elseif($maklumbalasterkini->ulasan!=''){
                $maklumbalasterkini = '';
                $createmaklumbalas = true;
            }else{
                $createmaklumbalas = false;
            }
        }

        return view('maklumbalas.edit',compact('penemuan','auditipenemuan','maklumbalasterkini','createmaklumbalas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dom = new \DomDocument();
        $rekodMaklumbalas = $request->maklumbalas;
        $dom->loadHtml($rekodMaklumbalas, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        // dd($request);
        $auditipenemuan = Auditipenemuan::find($request->auditipenemuan_id);
        if(isset($request->maklumbalas_id)){
            $maklumbalas = Maklumbalas::find($request->maklumbalas_id);
        }else{
            $maklumbalas = new Maklumbalas;
        }
        $maklumbalas->auditipenemuan_id = $auditipenemuan->id;
        $maklumbalas->auditi = $auditipenemuan->auditi;
        $maklumbalas->progress_id = $auditipenemuan->progress_id;
        $maklumbalas->save();

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/uploads/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);

            $attachment = new Attachment;
            $attachment->title = 'Gambar '.$k;
            $attachment->url = $image_name;
            $attachment->attachable_id = $maklumbalas->id;
            $attachment->attachable_type = 'App\Maklumbalas';
            $attachment->save();
        }

        // foreach($request->filesokongan as $key=>$filesokongan){
            if($files = $request->file('filesokongan')){
                foreach($files as $filesokongan){
                    $name = pathinfo($filesokongan->getClientOriginalName(), PATHINFO_FILENAME);
                    $fileName = time().'_'.$filesokongan->getClientOriginalName();
                    $filePath = $filesokongan->storeAs('uploads', $fileName, 'public');

                    $attachment = new Attachment;
                    $attachment->title = $name;
                    $attachment->url = 'uploads/'.$fileName;
                    $maklumbalas->attachments()->save($attachment);
                }
            }
            // $file = $request->file($filesokongan);



        // }

        $rekodMaklumbalas = $dom->saveHTML();
        $maklumbalas->maklumbalas = $rekodMaklumbalas;
        $maklumbalas->save();
        $auditipenemuan->status_jawatankuasa = 1;
        $auditipenemuan->save();
        flash('Maklumbalas telah berjaya disimpan.')->success()->important();
        return redirect('/maklumbalas/create/'.$auditipenemuan->laporan_id);
    }

    public function auditihantarjawatankuasa(Request $request)
    {
        $laporan = Laporan::with(['auditipenemuan'=>function($q){
            $q->where('status_hantar','auditi')->where('auditi',Auth::user()->id);
        }],['findings'=>function($que){
            $que->where('progress_id','3');
        }])->where('status','jawatankuasa')->where('id',$request->laporan_id)->first();

        foreach ($laporan->auditipenemuan as $key => $auditipenemuan) {
            $auditipenemuan->status_hantar = 'jawatankuasa';
            $auditipenemuan->save();
        }

        return redirect('maklumbalas');
    }

}
