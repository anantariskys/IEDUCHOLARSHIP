<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Jenjang;
use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beasiswas = Beasiswa::all();
        return view('beasiswa.index', compact('beasiswas'));
    }

   
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $tipes = Tipe::all();
        $jenjangs = Jenjang::all();
        return view('beasiswa.create', compact('tipes', 'jenjangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'asal_negara' => 'required|string|max:255',
            'mulai_tanggal' => 'required|date',
            'deadline_tanggal' => 'required|date',
            'syarat_ketentuan' => 'required|string',
            'link_pendaftaran' => 'required|url',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tipe_id' => 'required|exists:tipes,id',
            'jenjang_id' => 'required|exists:jenjangs,id',
        ]);

        $gambarPath = $request->file('gambar')->store('images', 'public');

        Beasiswa::create([
            'nama' => $validated['nama'],
            'asal_negara' => $validated['asal_negara'],
            'mulai_tanggal' => $validated['mulai_tanggal'],
            'deadline_tanggal' => $validated['deadline_tanggal'],
            'syarat_ketentuan' => $validated['syarat_ketentuan'],
            'link_pendaftaran' => $validated['link_pendaftaran'],
            'gambar' => $gambarPath,
            'tipe_id' => $validated['tipe_id'],
            'jenjang_id' => $validated['jenjang_id'],
        ]);

        return redirect()->route('admin.beasiswa.index')->with('success', 'Beasiswa berhasil ditambahkan.');
    }

    public function edit(Beasiswa $beasiswa)
    {
        $tipes = Tipe::all();
        $jenjangs = Jenjang::all();
        return view('beasiswa.update', compact('beasiswa', 'tipes', 'jenjangs'));
    }

    public function update(Request $request, Beasiswa $beasiswa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'asal_negara' => 'required|string|max:255',
            'mulai_tanggal' => 'required|date',
            'deadline_tanggal' => 'required|date',
            'syarat_ketentuan' => 'required|string',
            'link_pendaftaran' => 'required|url',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tipe_id' => 'required|exists:tipes,id',
            'jenjang_id' => 'required|exists:jenjangs,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            Storage::delete('public/' . $beasiswa->gambar);
            $gambarPath = $request->file('gambar')->store('images', 'public');
            $data['gambar'] = $gambarPath;
        } else {
            $data['gambar'] = $beasiswa->gambar;
        }

        $beasiswa->update($data);

        return redirect()->route('admin.beasiswa.index')->with('success', 'Beasiswa updated successfully.');
    }

    public function destroy(Beasiswa $beasiswa)
    {
        if ($beasiswa->gambar) {
            Storage::delete('public/' . $beasiswa->gambar);
        }

        $beasiswa->delete();

        return redirect()->route('admin.beasiswa.index')->with('success', 'Beasiswa deleted successfully.');
    }


}
