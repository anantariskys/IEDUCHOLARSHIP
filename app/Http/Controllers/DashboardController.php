<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Jenjang;
use App\Models\Tipe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $beasiswas = Beasiswa::all();
        $tipes = Tipe::all();
        $jenjangs = Jenjang::all();
        return view('dashboard.user', compact('beasiswas','tipes','jenjangs'));
    }
    public function show($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('dashboard.detail', compact('beasiswa'));
    }
    
    


    // Controller untuk filter berdasarkan checkbox filter
    public function filter(Request $request)
    {
        $query = Beasiswa::query();

        if ($request->has('jenjang') && is_array($request->jenjang)) {
            $query->whereIn('jenjang_id', $request->jenjang);
        }

        if ($request->has('tipe') && is_array($request->tipe)) {
            $query->whereIn('tipe_id', $request->tipe);
        }
        if ($request->has('bulan') && $request->has('tahun')) {
            $month = $request->bulan;
            $year = $request->tahun;
            $startOfMonth = Carbon::createFromDate($year, $month, 1)->startOfMonth();
            $endOfMonth = Carbon::createFromDate($year, $month, 1)->endOfMonth();
       
            $query->where(function($query) use ($startOfMonth) {
                $query->where('deadline_tanggal', '>', $startOfMonth);
                    
                    });
                }
                $beasiswas = $query->get();
        $tipes = Tipe::all();
        $jenjangs = Jenjang::all();
        
        return view('dashboard.user', compact('beasiswas', 'tipes', 'jenjangs'));
    }
}
