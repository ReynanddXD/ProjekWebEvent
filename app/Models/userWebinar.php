<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userWebinar extends Model
{
     use HasFactory;
         protected $table = 'user_webinar';
  protected $fillable= [
     'nama',
     'email',
     'noHp',
     'instansi',
     'pekerjaan',
     'user_id',
     'webinar_id',
  ];
  // Relasi ke tabel Webinar
    public function webinar()
    {
        return $this->belongsTo(Webinar::class, 'webinar_id');
    }

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
