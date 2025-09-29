<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userLomba extends Model
{
    use HasFactory;
     protected $table = 'user_lomba';
  protected $fillable= [
        'nama',
           'email',
       'noHp',
        'instansi',
        'lomba_id',
       'pekerjaan',
  ];
public function lomba(){
    return $this->belongsTo(Lomba::class, 'lomba_id');
}

}
