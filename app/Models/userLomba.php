<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userLomba extends Model
{
    use HasFactory;
     protected $table = 'user_lomba';
  protected $fillable= [
        'user_id',
        'nama',
           'email',
       'noHp',
        'instansi',
        'lomba_id',
       'pekerjaan',
  ];
    // Relasi ke tabel Lomba
public function lomba(){
    return $this->belongsTo(Lomba::class, 'lomba_id');
}
    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
