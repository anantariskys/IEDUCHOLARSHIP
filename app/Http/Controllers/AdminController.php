<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $beasiswas = Beasiswa::all();
        return view('dashboard.admin', compact('beasiswas'));
    }
}
