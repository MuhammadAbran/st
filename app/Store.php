<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';

    public function customer()
    {
      return $this->hasMany(\App\Customer::class, 'store_id', 'store_id');
    }
}
