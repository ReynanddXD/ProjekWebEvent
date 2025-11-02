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
  ];
}
