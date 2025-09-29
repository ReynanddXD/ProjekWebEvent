<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use Illuminate\Http\Request;

class LombaController extends Controller
{
    public function create()
{
    return view('halaman.dashboardAdminLomba');
}

public function index(){
    $semuaLomba = Lomba::latest()->get();
    return view('form.tabelLomba', compact('semuaLomba'));
}

public function store(Request $request){
    $validatedData = $request->validate([
        'lomba'=>'required|string|max:255',
        'pelaksanaan'=>'required|date',
        'penyelenggara'=>'required|string|max:255',
        'kategoriPeserta'=>'required|string|max:255',
        'deskripsi'=>'nullable|string',
        'gambar'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'panduan'=>'nullable|file|mimes:pdf|max:20480',



    ]);


    if ($request->hasFile('gambar')){
        $path = $request->file('gambar')->store('images/lomba', 'public');
        $validatedData['gambar']=$path;
    }

   if ($request->hasFile('panduan')) {
        // Dibuat konsisten dengan cara penyimpanan gambar
        $panduanPath = $request->file('panduan')->store('lomba_panduan', 'public');
        $validatedData['panduan'] = $panduanPath;
    }

    //  dd($request->file('panduan'));

    Lomba::create($validatedData);
     return redirect()->route('lomba.create')->with('success', 'Data Lomba berhasik disimpan!');
}
}
