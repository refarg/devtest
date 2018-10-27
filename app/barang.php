<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
  protected $table = 'barang';
  protected $primaryKey = 'idbarang';
  protected $fillable = [
      'namabarang', 'idjenis', 'deskripsi', 'stok', 'hargabarang','gambarbarang'
  ];

  public $timestamps=false;

  public function pembelian()
      {
          return $this->hasMany('App\pembelian');
      }

  public function jenisbarang()
      {
          return $this->hasOne('App\jenisbarang','idjenis','idjenis');
      }
}
