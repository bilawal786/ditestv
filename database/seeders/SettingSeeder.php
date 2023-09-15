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
            'logo1' => 'images/1694666369-ditesta.png',
            'logo2' => 'images/1694760318-loading.png',
            'title' => ':: Ditesta :: ',
            'name' => 'Website',
            'email' => 'admin@gmail.com',
        ]);
    }
}
