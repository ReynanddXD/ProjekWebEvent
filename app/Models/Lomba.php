<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    protected $table = 'lombas'; // ganti sesuai nama tabelmu
    protected $fillable =[
        'lomba',
        'pelaksanaan',
        'penyelenggara',
        'kategoriPeserta',
        'deskripsi',
        'gambar',
    ];
}
