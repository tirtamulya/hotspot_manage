<?php

use App\CustomerType;
use Illuminate\Database\Seeder;

class CustomerTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new CustomerType();
        $type->id = 'member';
        $type->name = 'Member';
        $type->save();

        $type = new CustomerType();
        $type->id = 'guest';
        $type->name = 'Guest';
        $type->save();
    }
}
