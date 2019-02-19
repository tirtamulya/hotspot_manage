<?php

use App\VoucherType;
use Illuminate\Database\Seeder;

class VoucherTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new VoucherType();
        $type->id = 'H';
        $type->name = 'Hours';
        $type->save();

        $type = new VoucherType();
        $type->id = 'Q';
        $type->name = 'Quota';
        $type->save();
    }
}
