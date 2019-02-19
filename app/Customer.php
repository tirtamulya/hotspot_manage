<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $fillable = ['customer_id','name','address','email','phone','birthday','birthday_place','gender','type_id','hotspot_id'];
    public $incrementing = false;

    public function type()
    {
    	return $this->belongsTo('App\CustomerType', 'type_id','id');
    }

    public function hotspot()
    {
    	return $this->belongsTo('App\Hotspot', 'hotspot_id','hotspot_id');
    }

    public function sales()
    {
    	return $this->hasMany('App\Sale', 'customer_id','id');
    }

    public function scopeMaxno($query)
    {
        $queryMax =  $query->select(DB::raw('SUBSTRING(`hotspot_id` ,2) AS kd_max'))
            ->orderBy('hotspot_id', 'asc')
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

        return 'C'.$kd_fix;
    }
}
