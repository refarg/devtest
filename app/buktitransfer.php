<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buktitransfer extends Model
{
  protected $table = 'buktitransfer';
  protected $primaryKey = 'idbtransfer';
  protected $fillable = ['idcheckout','buktitransfer','jasapengiriman','statusverif','resi'];
  public $timestamps = true;
}
