<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
class LombaUser extends Controller
{
    public function index(){
      $kategoriLomba = Lomba::select('id','lomba')->get();
    $userLomba = Lomba::latest()->get();
    return view('form.formUserLomba', compact('userLomba'));
}

    public function create(){
          $kategoriLomba = Lomba::select('id','lomba')->get();
         dd($kategoriLomba);
          return view('form.formUserLomba', compact('kategoriLomba'));

    }

    public function store(Request $request){
       $validatedData = $request->validate([
        'nama'=>'required|string|max:255',
           'email'=>'required|email',
       'noHp'=>'required|string',
        'instansi'=>'required|string|max:255',
        'lomba_id' => 'required|integer|exists:lombas,id',
       'pekerjaan'=>'required|string|max:255',
       ]);

    LombaUser::create($validatedData);
     return redirect()->route('ulomba.create')->with('success', 'Data Lomba berhasil disimpan!');
       }


}
