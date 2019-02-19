<?php

use App\Hotspot;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class HotspotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hs = new Hotspot();
        $hs->id = Uuid::Uuid4()->getHex();
        $hs->hotspot_id = $hs->Maxno();
        $hs->name = ' Hotspot Cafe Enak';
        $hs->address = "Jl Mgr soegiyapranata no 14";
        $hs->phone = '085678909876';
        $hs->ip_address = '202.234.34.1';
        $hs->print_port = '90001';
        $hs->save();
    }
}
