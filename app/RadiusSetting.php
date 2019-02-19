<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadiusSetting extends Model
{
    protected $fillable =['name','notes','category'];

    public $incrementing =false;

    public function vouchers()
    {
    	return $this->hasMany('App\Voucher', 'id','radius_type');
    }
}
