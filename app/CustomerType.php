<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    protected $fillable = ['name'];

    public function customers()
    {
    	return $this->hasMany('App\Customer', 'id', 'type_id');
    }
}
