<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class WebinarController extends Controller
{
    public function index(){
         $semuaWebinar = Webinar::latest()->get();
    return view('form.tabelWebinar', compact('semuaWebinar'));
    }
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
            'gambar'=>'required|image|mimes:jpeg,png,jpg,gif|max:51200',
        ]);

        if ($request->hasFile('gambar')){
            $path = $request->file('gambar')->store('images/webinar', 'public');
            $validatedData['gambar']=$path;
        }
        Webinar::create($validatedData);
        return redirect()->route('webinar.index')->with('success', 'Data webinar berhasil disimpan!');
    }

    public function edit(Webinar $webinar){
        return view('form.edit-webinar', ['webinar' =>$webinar]);
    }

    public function update(Request $request, Webinar $webinar){
        $validateData = $request->validate([
                  'webinar'=>'required|string|max:255',
            'deskripsiWebinar'=>'nullable|string',
            'tanggal'=>'required|date',
            'pemateri'=>'required|string',
            'mulai'=>'required|date_format:H:i',
            'selesai'=>'required|date_format:H:i|after:mulai',
            'kategoriWebinar'=>'required|string',
            'tempat'=>'nullable|string',
            'gambar'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:51200',

        ]);

        //logika update
        if($request->hasFile('gambar')){
            if($webinar->gambar){
                Storage::disk('public')->delete($webinar->gambar);
            }
            $path = $request->file('gambar')->store('images/webinar', 'public');
            $validateData['gambar'] =$path;

        }
        $webinar->update($validateData);
        return redirect()->route('webinar.index')
        ->with('success', 'Webinar berhsil di update');

    }

    public function destroy(Webinar $webinar){
        if ($webinar->gambar){
            Storage::disk('public')->delete($webinar->gambar);
        }
        $webinar->delete();
        return redirect()->route('webinar.index')
        ->with('success', "Webinar berhasil dihapus");
    }
}
