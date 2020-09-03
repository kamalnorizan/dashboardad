<?php

namespace App\Http\Controllers;

use App\User;
use App\Jawatan;
use App\Organisasi;
use App\Org_type;
use App\Negeri;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titleOpts = Jawatan::pluck('name','id');
        // $orgOpts = Organisasi::pluck('name','id');
        $orgTypeOpts = Org_type::pluck('name','id');
        $stateOpts = Negeri::pluck('name','id');
        $stateOpts[0] = 'Sila pilih negeri';
        return view('users.create',compact('titleOpts','orgTypeOpts','stateOpts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function getOrg($id)
    {
        $organizations = Organisasi::where('org_type_id',$id)->get();
        return $organizations;
    }

    public function getOrgNegeri($id, $negeri)
    {
        $organizations = Organisasi::where('org_type_id',$id)->where('negeri_id',$negeri)->get();
        return $organizations;
    }


}
