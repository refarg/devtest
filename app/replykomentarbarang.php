<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class replykomentarbarang extends Model
{
  protected $table = 'replykomentarbarang';
  protected $primaryKey = 'idreply';
  protected $fillable = [
      'idkomentar','iduser','replykomentar'
  ];
  public $timestamps=true;
}
