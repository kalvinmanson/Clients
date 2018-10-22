<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
  protected $dates = ['admission'];
  public function clients()
  {
    return $this->hasMany('App\Client');
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
