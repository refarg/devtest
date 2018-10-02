<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailuser extends Model
{
  protected $table = 'detailuser';
  protected $primaryKey = 'iddetail';
  protected $fillable = [
      'iduser','namalengkap','alamat','nomorponsel','avatar',
  ];
  public $timestamps=false;
}
