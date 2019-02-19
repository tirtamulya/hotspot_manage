<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    protected $fillable = ['sales_id','customer_id','voucher_id','sales_amount','customer_name','customer_password','hotspot_id','user_id'];

    public $incrementing = false;

    public function customer()
    {
    	return $this->belongsTo('App\Customer', 'customer_id', 'customer_id');
    }

    public function voucher()
    {
    	return $this->belongsTo('App\Voucher','voucher_id','voucher_id');
    }

    public function hotspot()
    {
        return $this->belongsTo('App\Hotspot', 'hotspot_id','id');
    }

    public function rad_acct()
    {
        return $this->hasMany('App\RadiusAccounting','username','customer_name')->orderBy('acctstarttime', 'desc');
    }

    public function scopeMaxno($query)
    {
        $queryMax =  $query->select(DB::raw('SUBSTRING(`sales_id` ,2) AS kd_max'))
            ->orderBy('sales_id', 'asc')
            ->get();
        
        $arr1 = array();
        if ($queryMax->count() > 0) {
            foreach ($queryMax as $k=>$v)
            {
                $arr1[$k] = (int)$v->kd_max;
            }
            $arr2 = range(1, max($arr1));
            $missing = array_diff($arr2, $arr1);
            if (empty($missing)) {
                $tmp = end($arr1) + 1;
                $kd_fix = sprintf("%04s", $tmp);
            }else{
                $kd_fix = sprintf("%04s", reset($missing));
            }
        }
        else{
            $kd_fix = '0001';
        }

        return 'S'.$kd_fix;
    }
}
