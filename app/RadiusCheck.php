<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadiusCheck extends Model
{
    protected $fillable = ['username','attribute','op','value'];

    public $table = 'radcheck';

    public $timestamps = false;

    public function accounting()
    {
    	return $this->hasMany('App\RadiusAccounting', 'username', 'username');
    }

    public function sale()
    {
    	return $this->belongsTo('App\Sale','customer_name', 'usename');
    }
}
