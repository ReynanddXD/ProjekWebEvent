<?php

namespace App\Http\Controllers;

use App\Models\userWebinar;
use App\Models\Webinar;
use Illuminate\Http\Request;

class WebinarUser extends Controller
{

    public function index(){
    return view('form.formUserLomba');
}

    public function create(){

  $userLomba = userWebinar::latest()->get();
          return view('form.formUserLomba',compact('userWebinar'));

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

    WebinarUser::create($validatedData);
     return redirect()->route('uwebinar.create')->with('success', 'Data Webinar berhasil disimpan!');
       }
}
