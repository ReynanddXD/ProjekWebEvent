<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\userLomba;

class LombaUser extends Controller
{
    public function index(){

    $userLomba = UserLomba::latest()->get();
    return view('form.formUserLomba', compact('userLomba'));
}

    public function create(){

          return view('form.formUserLomba');

    }

    public function store(Request $request){
       $validatedData = $request->validate([
        'nama'=>'required|string|max:255',
           'email'=>'required|email',
       'noHp'=>'required|string',
        'instansi'=>'required|string|max:255',
       'pekerjaan'=>'required|string|max:255',
       ]);

    LombaUser::create($validatedData);
     return redirect()->route('ulomba.create')->with('success', 'Data Lomba berhasil disimpan!');
       }


}
