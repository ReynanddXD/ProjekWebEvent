<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function create(){
        return view('halaman.dashboardAdminWebinar');
    }

    public function store(Request $request){
        $validatedData = $request ->validate([
            'webinar'=>'required|string|max:255',
            'deskripsiWebinar'=>'nullable|string',
            'tanggal'=>'required|date',
            'pemateri'=>'required|string',
            'mulai'=>'required|date_format:H:i',
            'selesai'=>'required|date_format:H:i|after:mulai',
            'kategoriWebinar'=>'required|string',
            'tempat'=>'required|string',
            'gambar'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')){
            $path = $request->file('gambar')->store('images/webinar', 'public');
            $validatedData['gambar']=$path;
        }
        Webinar::create($validatedData);
        return redirect()->route('webinar.create')->with('success', 'Data webinar berhasil disimpan!');
    }
}
