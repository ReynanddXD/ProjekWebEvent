<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPesertaController extends Controller
{
    public function index(){
        $pesertaLomba = DB::table('user_lomba')
        ->select(
            'nama',
            'email',
            'noHp',
            'instansi',
            'pekerjaan',
            'created_at', //kasih alias
            'lomba_id as relasi_id',
            DB::raw("NULL as user_id"), //Buat kolom user_id palsu agar sama
            DB::raw("'Lomba' as tipe_kegiatan")
        );

        $pesertaWebinar = DB::table('user_webinar')
        ->select(
            'nama',
                'email',
                'noHp',
                'instansi',
                'pekerjaan',
                'created_at',
                'webinar_id as relasi_id', // Kita beri alias 'relasi_id' juga
                'user_id', // Ambil user_id asli
                DB::raw("'Webinar' as tipe_kegiatan")
        );

        //gabungin dua query
        $semuaPeserta = $pesertaLomba
        ->union($pesertaWebinar)
        ->orderBy('created_at', 'desc') //urutan berdasarkan data baru
        ->paginate(20);

            return view('halaman.peserta-admin', [
            'peserta' => $semuaPeserta
        ]);
    }
}
