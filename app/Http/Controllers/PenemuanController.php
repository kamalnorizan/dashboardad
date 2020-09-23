<?php

namespace App\Http\Controllers;

use App\Penemuan;
use App\Laporan;
use App\Organisasi;
use App\User;
use App\Attachment;
use App\Auditipenemuan;
use Illuminate\Http\Request;

class PenemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Laporan $laporan)
    {
        $findings = $laporan->findings;
        $org_opts = Organisasi::pluck('name','id');
        $org_opts[0] = 'Sila pilih Organisasi Auditi';
        return view('penemuan.index',compact('findings','laporan','org_opts'));
    }

    public function ajaxpenemuan(Laporan $laporan)
    {
        $findings = $laporan->findings;

        return datatables()->of($findings)
            ->addColumn('no_bil', function($penemuan){
                $no_bil = $penemuan->id;
                return $no_bil;
            })
            ->addColumn('perenggan', function($penemuan){
                $perenggan = $penemuan->perenggan;
                return $perenggan;
            })
            ->addColumn('penemuanaudit', function($penemuan){
                $penemuanaudit = $penemuan->penemuan;
                return $penemuanaudit;
            })
            ->addColumn('tindakanauditi', function($penemuan){
                $tindakanauditi = '';
                foreach ($penemuan->audities as $key => $auditi) {
                    $tindakanauditi.=$auditi->organisasi->nickname;
                    $tindakanauditi.='<br>';
                }
                return $tindakanauditi;
            })
            ->addColumn('pegawai', function($penemuan){
                $pegawai = '';
                foreach ($penemuan->audities as $key => $auditi) {
                    $pegawai.=$auditi->auditiuser->name;
                    $pegawai.='<br>';
                }
                return $pegawai;
            })
            ->addColumn('tindakan', function($penemuan){
                $buttons='';
                    $buttons .= '<a class="btn btn-xs btn-info" href="'.route('penemuan.show',['penemuan'=>$penemuan->id]).'"><i class="fa fa-eye"></i></a> ';
                    if($penemuan->progress->name != 'Lulus'){
                        $buttons .= '<a class="btn btn-xs btn-primary" href="'.route('penemuan.edit',['penemuan'=>$penemuan->id]).'"><i class="fa fa-edit"></i></a> ';
                        $buttons .= '<a onclick="return confirm(\'Adakah anda pasti?\')" class="btn btn-xs btn-danger" href="'.route('penemuan.destroy',['penemuan'=>$penemuan->id]).'"><i class="fa fa-times"></i></a>';
                    }

                return $buttons;
            })
            ->rawColumns(['no_bil','perenggan','penemuanaudit','tindakanauditi','pegawai','tindakan'])
            ->make(true);
    }

    public function getorganisasi()
    {
        $organisasi = Organisasi::all();

        $org_opts='<option selected value="">Sila pilih Auditi</option>';
        foreach ($organisasi as $key => $value) {
            $org_opts.='<option value="'.$value->id.'">'.$value->name.'</option>';
        }
        return $org_opts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $rekodPenemuan = $request->penemuan;
        $dom->loadHtml($rekodPenemuan, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        $penemuan = new Penemuan;
        $penemuan->perenggan = $request->perenggan;
        $penemuan->laporan_id = $request->laporan_id;
        $penemuan->progress_id = 1;
        $penemuan->save();

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
            $attachment->attachable_id = $penemuan->id;
            $attachment->attachable_type = 'App\Penemuan';
            $attachment->save();
        }
        $rekodPenemuan = $dom->saveHTML();
        $penemuan->penemuan = $rekodPenemuan;
        $penemuan->save();

        foreach ($request->organisasi_id as $key => $organisasi) {
            $auditi = User::where('organisasi_id',$organisasi)->role('auditee')->first();
            $auditipenemuan = new Auditipenemuan;
            $auditipenemuan->auditi = $auditi->id;
            $auditipenemuan->laporan_id = $request->laporan_id;
            $auditipenemuan->penemuan_id = $penemuan->id;
            $auditipenemuan->organisasi_id = $organisasi;
            $auditipenemuan->progress_id = 1;
            $auditipenemuan->save();
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penemuan  $penemuan
     * @return \Illuminate\Http\Response
     */
    public function show(Penemuan $penemuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penemuan  $penemuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penemuan $penemuan)
    {
        $org_opts = Organisasi::pluck('name','id');
        $org_opts[0] = 'Sila pilih Organisasi Auditi';
        return view('penemuan.edit',compact('penemuan','org_opts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penemuan  $penemuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penemuan $penemuan)
    {
        $dom = new \DomDocument();
        $rekodPenemuan = $request->penemuan;
        $dom->loadHtml($rekodPenemuan, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        $penemuan->perenggan = $request->perenggan;
        $penemuan->progress_id = 1;
        $penemuan->save();

        foreach($penemuan->attachments as $attachment){
            $attachment->delete();
        }

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            if(substr($data,0,8)!='/uploads'){
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "/uploads/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }else{
                $image_name = $data;
            }

            $attachment = new Attachment;
            $attachment->title = 'Gambar '.$k;
            $attachment->url = $image_name;
            $attachment->attachable_id = $penemuan->id;
            $attachment->attachable_type = 'App\Penemuan';
            $attachment->save();
        }

        $rekodPenemuan = $dom->saveHTML();
        $penemuan->penemuan = $rekodPenemuan;
        $penemuan->save();

        foreach ($penemuan->audities as $key => $auditi) {
            $auditi->delete();
        }

        foreach ($request->organisasi_id as $key => $organisasi) {
            $auditi = User::where('organisasi_id',$organisasi)->role('auditee')->first();
            $auditipenemuan = new Auditipenemuan;
            $auditipenemuan->auditi = $request->user_id[$key];
            $auditipenemuan->laporan_id = $penemuan->laporan_id;
            $auditipenemuan->penemuan_id = $penemuan->id;
            $auditipenemuan->organisasi_id = $organisasi;
            $auditipenemuan->progress_id = 1;
            $auditipenemuan->save();
        }

        flash('Penemuan telah berjaya dikemaskini')->success()->important();
        return redirect()->route('penemuan.index',['laporan'=>$penemuan->laporan_id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penemuan  $penemuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penemuan $penemuan)
    {
        $penemuan->delete();
        flash('Penemuan berjaya dibatalkan')->error()->important();
        return back();
    }

    public function getpegawai(Organisasi $organisasi)
    {
        $users = User::where('organisasi_id',$organisasi->id)->role('auditee')->get();

        return $users;
    }
}
