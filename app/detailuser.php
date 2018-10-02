<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailuser extends Model
{
  protected $table = 'detailuser';
  protected $primaryKey = 'iddetail';
  protected $fillable = [
      'namalengkap','alamat','nomorponsel','avatar'
  ];
  protected $hidden = [
      'iduser',
  ];
  public $timestamps=false;
}
