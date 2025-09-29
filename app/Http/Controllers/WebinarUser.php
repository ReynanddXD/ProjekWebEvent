<?php

namespace App\Http\Controllers;

use App\Models\userWebinar;
use Illuminate\Http\Request;

class WebinarUser extends Controller
{

    public function create(){
          return view('form.formUserWebinar');
    }

    public function store(Request $request){
       $validatedData = $request->validate([
        'nama'=>'required|string|max:255',
           'email'=>'required|email',
       'noHp'=>'required|string',
        'instansi'=>'required|string|max:255',
       'pekerjaan'=>'required|string|max:255',
       ]);

    userWebinar::create($validatedData);
     return redirect()->route('uwebinar.create')->with('success', 'Data Webinar berhasil disimpan!');
       }
}
