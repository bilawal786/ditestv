<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'logo1' => '/images/icon-dark.svg',
            'logo2' => '/images/icon-light.svg',
            'title' => ':: HexaBit :: ',
            'name' => 'Website',
            'email' => 'admin@gmail.com',
        ]);
    }
}
