<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
  protected $table = 'barang';
  protected $primaryKey = 'idbarang';
  protected $fillable = [
      'namabarang', 'jenisbarang', 'deskripsi', 'stok', 'hargabarang'
  ];
  public $timestamps=false;
  public function pembelian()
      {
          return $this->hasMany('App\pembelian');
      }
}
