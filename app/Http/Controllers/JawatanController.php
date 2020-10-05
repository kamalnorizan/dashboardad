<?php

namespace App\Http\Controllers;

use App\Jawatan;
use Illuminate\Http\Request;

class JawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawatans = Jawatan::orderBy('id','desc')->paginate(10);

        return view('jawatan.index',compact('jawatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jawatan.create');
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

            'name'    => 'required',

        ]);

        Jawatan::create($request->all());

        flash('Maklumat jawatan telah berjaya ditambah')->success()->important();
        return redirect()->route('jawatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jawatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jawatan $jawatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jawatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jawatan $jawatan)
    {
                 return view('jawatan.edit', compact('jawatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jawatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jawatan $jawatan)
    {
        $request->validate([

            'name'         => 'required',

        ]);

        $jawatan->update($request->all());


        flash('Maklumat jawatan telah berjaya dikemaskini')->success()->important();
        return redirect('jawatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jawatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jawatan $jawatan)
    {
        $jawatan->delete();
        flash('Jawatan telah dipadam')->error()->important();
        return back();
    }
}
