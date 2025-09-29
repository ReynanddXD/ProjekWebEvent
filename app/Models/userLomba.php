<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userLomba extends Model
{
    use HasFactory;
  protected $fillable= [
        'nama',
           'email',
       'noHp',
        'instansi',
        'lomba_id',
       'pekerjaan',
  ];
}
