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

  public function barang()
      {
          return $this->belongsTo('App\barang');
      }

      public function jenisbarang()
          {
              return $this->belongsTo('App\jenisbarang');
          }
}
