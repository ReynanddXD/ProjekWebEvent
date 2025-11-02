<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\userLomba;

class LombaUser extends Controller
{
  public function showKategori(){
    $kategoriLomba = Lomba::all(); // ambil semua data dari tabel lombas
    return view('form.formUserLomba', compact('kategoriLomba'));
}

    public function index(){

    $userLomba = UserLomba::latest()->get();
    return view('form.formUserLomba', compact('userLomba'));
}


    public function create(){
    $kategoriLomba = Lomba::all(); // ambil semua data lomba
    return view('form.formUserLomba', compact('kategoriLomba'));


    }

    public function store(Request $request){
       $validatedData = $request->validate([
        'nama'=>'required|string|max:255',
           'email'=>'required|email',
       'noHp'=>'required|string',
        'instansi'=>'required|string|max:255',
        'lomba_id' => 'required|exists:lombas,id',
       'pekerjaan'=>'required|string|max:255',

       ]);

   userLomba::create($validatedData);
     return redirect()->route('ulomba.create')->with('success', 'Data Lomba berhasil disimpan!');
       }


}
