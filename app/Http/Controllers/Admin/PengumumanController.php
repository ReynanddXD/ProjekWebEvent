<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dataPengumuman = Pengumuman::latest()->paginate(2);
        return view('halaman.daftarPengumuman', ['daftarPengumuman'=>$dataPengumuman]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halaman.formPengumuman');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'status' => 'required|in:published,draft',
            'kategori' => 'nullable|string',
            'is_pinned' => 'nullable|boolean', // 'is_pinned' akan bernilai 1 jika dicentang
        ]);
        //memastikan saja di centang atau enggak, klo iya berarti bernilai true
        $validatedData['is_pinned'] = $request->has('is_pinned');
        //buat tabel baru di dalam pengumumman
        Pengumuman::create($validatedData);

        return redirect()->route('pengumuman.index')
        ->with('success', "Pengumuman baru berhasil disimpan.");
     }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengumuman $pengumuman)//otomatis ambil data berdasarkan ID
    {
        return view('halaman.editPengumuman', ['pengumuman'=>$pengumuman]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $validateData = $request->validate([
            'judul'=>'required|string|max:255',
            'konten' => 'required|string',
            'status' => 'required|in:published,draft',
            'kategori' => 'nullable|string',
            'is_pinned' => 'nullable|boolean',
        ]);

        $validateData['is_pinned'] = $request->has('is_pinned');
        $pengumuman->update($validateData);

        return redirect()->route('pengumuman.index')
        ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return redirect()->route('pengumuman.index')
        ->with('success', "Pengumuman berhasi; dihapus");
    }
}
