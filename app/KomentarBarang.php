<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarBarang extends Model
{
  protected $table = 'komentarbarang';
  protected $primaryKey = 'idkomentar';
  protected $fillable = [
      'idbarang','iduser','komentar'
  ];
  public $timestamps=true;
}
