<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisbarang extends Model
{
  protected $table = 'jenisbarang';
  protected $primaryKey = 'idjenis';
  protected $fillable = [
      'jenisbarang',
  ];
  public $timestamps=false;
}
