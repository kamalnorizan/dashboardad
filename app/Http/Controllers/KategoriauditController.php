<?php

namespace App\Http\Controllers;

use App\Kategoriaudit;
use Illuminate\Http\Request;

class KategoriauditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategoriaudit::with('subkategoriad','parentkategori')->whereNull('subkategori')->paginate(15);
        return view('kategori.index',compact('kategori'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategoriaudit::with('parentkategori')->paginate(15);
        $parentCatOpts = $kategori->where('subkategori','')->pluck('name','id');
        $parentCatOpts['main']='Main';
        $parentCatOpts['']='Sila pilih parent kategori';
        return view('kategori.create',compact('kategori','parentCatOpts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = new Kategoriaudit;
        $kategori->name = $request->name;

        if($request->subkategori=='main'){
            $subkategori=NULL;
        }else{
            $subkategori=$request->subkategori;
        }

        $kategori->subkategori = $subkategori;
        $kategori->save();

        flash('Kategori telah berjaya ditambah')->success()->important();
        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategoriaudit  $kategoriaudit
     * @return \Illuminate\Http\Response
     */
    public function show(Kategoriaudit $kategoriaudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategoriaudit  $kategoriaudit
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategoriaudit $kategoriaudit)
    {
        $kategori = $kategoriaudit;
        $parentCatOpts = $kategori->where('subkategori','')->pluck('name','id');
        $parentCatOpts['main']='Main';
        $parentCatOpts['']='Sila pilih parent kategori';
        if($kategori->subkategori==''){
            $kategori->subkategori='main';
        }
        // dd($kategori);
        return view('kategori.edit',compact('kategori','parentCatOpts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategoriaudit  $kategoriaudit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $kategoriaudit = Kategoriaudit::find($request->kategori_id);
        $kategoriaudit->name = $request->name;

        if($request->subkategori=='main'){
            $subkategori=NULL;
        }else{
            $subkategori=$request->subkategori;
        }

        $kategoriaudit->subkategori = $subkategori;
        $kategoriaudit->save();
        flash('Kategori telah dikemaskini')->success()->important();
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategoriaudit  $kategoriaudit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategoriaudit $kategoriaudit)
    {
        //
    }
}
