<?php

namespace App\Http\Controllers;
use App\Penemuan;
use App\Laporan;
use App\Auditipenemuan;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $laporan = Laporan::with('laporan.auditipenemuan')->where('user_id',Auth::user()->id);

        return view('home',compact('laporan'));
    }


}
