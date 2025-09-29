<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable= [
    'webinar',
    'deskripsiWebinar',
    'tanggal',
    'pemateri',
    'mulai',
    'selesai',
    'kategoriWebinar',
     'tempat',
    'gambar',
    ];
}
