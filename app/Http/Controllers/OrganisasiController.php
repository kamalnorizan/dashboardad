<?php

namespace App\Http\Controllers;

use App\Organisasi;
use App\Org_type;
use App\Negeri;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organisasi::orderBy('id','desc')->paginate(20);
        return view('organisasi.index',compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $org_type_opts=Org_type::pluck('name','id');
        $org_type_opts[0]='Sila pilih jenis organisasi';

        $negeri_opts=Negeri::pluck('name','id');
        $negeri_opts[0]='Sila pilih negeri';

        return view('organisasi.create',compact('org_type_opts','negeri_opts'));
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
            'code_ppk'     => 'required|unique:organisasi',
            'name'         => 'required',
            'nickname'     => 'required',
            'org_type_id'  => 'required',
            'address1'     => 'required',
            'address2'     => 'required',
            'postcode'     => 'required',
            'city'         => 'required',
            'negeri_id'    => 'required',
            'email'        => 'required|email',
            'phoneNumber'  => 'required',
            'faxNumber'    => 'required',
        ]);

        Organisasi::create($request->all());

        flash('Maklumat organisasi telah berjaya direkodkan')->success()->important();
        return redirect('organisasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Organisasi $organisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisasi $organisasi)
    {
        $org_type_opts=Org_type::pluck('name','id');
        $org_type_opts[0]='Sila pilih jenis organisasi';

        $negeri_opts=Negeri::pluck('name','id');
        $negeri_opts[0]='Sila pilih negeri';

        return view('organisasi.edit', compact('organisasi', 'org_type_opts', 'negeri_opts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisasi $organisasi)
    {
        $request->validate([
            'code_ppk'     => 'required',
            'name'         => 'required',
            'nickname'     => 'required',
            'org_type_id'  => 'required',
            'address1'     => 'required',
            'address2'     => 'required',
            'postcode'     => 'required',
            'city'         => 'required',
            'negeri_id'    => 'required',
            'email'        => 'required|email',
            'phoneNumber'  => 'required',
            'faxNumber'    => 'required',
        ]);

        $organisasi->update($request->all());

        flash('Kemaskini maklumat organisasi telah berjaya.')->success()->important();
        return redirect('organisasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisasi $organisasi)
    {
        //
    }
}
