<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
      'first_name', 'last_name', 'email', 'address_id', 'store_id',
    ];
    public $timestamps = false;


    public function store()
    {
    	return $this->hasOne(\App\Store::class,'store_id','store_id');
    }

}
