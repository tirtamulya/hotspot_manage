<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Voucher extends Model
{
    protected $fillable = ['voucher_id','name','price','radius_type','radius_value','description','type_id'];

    public $incrementing = false;

    public function radius()
    {
    	return $this->belongsTo('App\RadiusSetting', 'radius_type', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\VoucherType', 'type_id', 'id');
    }

    public function sales()
    {
        return $this->hasMany('App\Sale', 'voucher_id','voucher_id');
    }

    public function scopeMaxno($query)
    {
        $queryMax =  $query->select(DB::raw('SUBSTRING(`voucher_id` ,2) AS kd_max'))
            ->orderBy('voucher_id', 'asc')
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

        return 'V'.$kd_fix;
    }
}
