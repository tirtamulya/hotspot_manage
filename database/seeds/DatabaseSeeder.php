<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HotspotTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CustomerTypeTableSeeder::class);
        $this->call(RadiusSettingTableSeeder::class);
        $this->call(VoucherTypeTableSeeder::class);
    }
}
