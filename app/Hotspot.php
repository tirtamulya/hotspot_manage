<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hotspot extends Model
{
    protected $fillable = ['hotspot_id','name','address','phone','ip_address','print_port'];

    public $incrementing = false;

    public function sales()
    {
    	return $this->hasMany('App\Sale', 'hotspot_id','hotspot_id');
    }

    public function users()
    {
    	return $this->hasMany('App\User','hotspot_id','hotspot_id');
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

        return 'H'.$kd_fix;
    }
}
