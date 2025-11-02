<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Lomba extends Model
{
    use HasFactory;

    protected $table = 'lombas';
    protected $fillable =[
        'lomba',
        'pelaksanaan',
        'penyelenggara',
        'kategoriPeserta',
        'harga',
        'deskripsi',
        'gambar',
        'panduan',
    ];

    public function userLombas(){
        return $this->hasMany(UserLomba::class, 'lomba_id');
    }

    public function users()
    {
        // Asumsi nama tabel pivot adalah 'lomba_user'
        return $this->belongsToMany(User::class, 'lomba_user', 'lomba_id', 'user_id')
                    ->withTimestamps();
    }

}
