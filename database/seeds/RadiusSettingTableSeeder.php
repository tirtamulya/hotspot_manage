<?php

use App\RadiusSetting;
use Illuminate\Database\Seeder;

class RadiusSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $radius =  new RadiusSetting();
        $radius->id = 'Max-All-Session';
        $radius->name = 'Session Time';
        $radius->category = 'seconds';
        $radius->save();

        $radius = new RadiusSetting();
        $radius->id = 'Max-time-limit';
        $radius->name = 'Bandwidth limiter';
        $radius->category = 'bandwidth';
        $radius->save();
    }
}
