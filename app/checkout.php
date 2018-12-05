<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
  protected $table = 'checkout';
  protected $primaryKey = 'idcheckout';
  protected $fillable = ['idpembelian','idbarang','iduser','jumlahbarang'];
  public $timestamps = true;
}
