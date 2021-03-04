<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Vlaporanmaklumbalas;

class DashboardController extends Controller
{
    public function index()
    {
        // $laporan = Laporan::where('tahun',date('Y')-1)->where('status','jawatankuasa')->get();
        $laporan = Vlaporanmaklumbalas::where('tahun',date('Y')-1)->get();
        // dd($laporan);
        $tahun = Laporan::groupBy('tahun')->pluck('tahun','tahun');
        // dd($tahun);

        return view('Dashboard.index',compact('laporan','tahun'));
    }

    public function ajaxReportByYear($year)
    {
        $laporan = Vlaporanmaklumbalas::where('tahun',$year)->get();

        return response()->json($laporan);
    }

    public function detaillaporan(Laporan $laporan, $progress_id)
    {
        $senaraimaklumbalas = $laporan->auditipenemuan->where('progress_id',$progress_id);
        // dd($senarailaporan);

        return view('Dashboard.detail',compact('laporan','senaraimaklumbalas'));
    }
}
