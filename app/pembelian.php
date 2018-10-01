<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    //
    protected $table = 'pembelian';
    protected $primaryKey = 'idpembelian';
    protected $fillable = ['idbarang','iduser','jumlahbarang'];
    public $timestamps = true;

}
