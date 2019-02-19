<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherType extends Model
{
	protected $fillable = ['name'];

	public $incrementing = false;
	
    public function vouchers()
    {
    	return $this->hasMany('App\Voucher','type_id','id');
    }
}
