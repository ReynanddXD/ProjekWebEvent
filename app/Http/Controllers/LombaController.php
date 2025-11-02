<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use Illuminate\Http\Request;
// Tambahkan ini di bagian paling atas file controller Anda:
use Illuminate\Support\Facades\Storage;

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
        'harga'=>'required|numeric|min:0',
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
     return redirect()->route('lomba.index')->with('success', 'Data Lomba berhasil disimpan!');
}

public function edit(Lomba $lomba){
    return view('form.edit-lomba', ['lomba' =>$lomba]);
}

public function update(Request $request, Lomba $lomba){
      $validatedData = $request->validate([
        'lomba'=>'required|string|max:255',
        'pelaksanaan'=>'required|date',
        'penyelenggara'=>'required|string|max:255',
        'kategoriPeserta'=>'required|string|max:255',
        'harga'=>'required|numeric|min:0',
        'deskripsi'=>'nullable|string',
        'gambar'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'panduan'=>'nullable|file|mimes:pdf|max:20480',
    ]);

//logika update
if ($request->hasFile('gambar')){
    if ($lomba->gambar){
        Storage::disk('public')->delete($lomba->gambar);

    }
    // Simpan gambar baru
          $path = $request->file('gambar')->store('images/lomba', 'public');
          $validatedData['gambar'] = $path;

          // 2. Cek jika ada file panduan baru
      if ($request->hasFile('panduan')) {
          // Hapus panduan lama (jika ada)
          if ($lomba->panduan) {
              Storage::disk('public')->delete($lomba->panduan);
          }
          // Simpan panduan baru
          $panduanPath = $request->file('panduan')->store('lomba_panduan', 'public');
          $validatedData['panduan'] = $panduanPath;
      }

}
  $lomba->update($validatedData);
        return redirect()->route('lomba.index')
        ->with('success', 'Lomba berhasil di Update.');

}

public function destroy(Lomba $lomba){
    if ($lomba->gambar){
        Storage::disk('public')->delete($lomba->gambar);
    }if ($lomba->panduan){
        Storage::disk('public')->delete($lomba->panduan);
    }
    $lomba->delete();
    return redirect()->route('lomba.index')
    ->with('success', "Lomba berhasil di hapus");
}
}
