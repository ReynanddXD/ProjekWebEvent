<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanUserController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::where('status', 'publish')
                            ->orderBy('created_at', 'desc')
                            ->get();
        return view('halaman.user.pengumumanUser', compact('pengumumans'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('halaman.user.pengumumanDetail', compact('pengumuman'));
    }
}
