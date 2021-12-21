<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeleponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
            DB::table('pengguna')->insert([
                'nomor_telepon'  => '081234566'
                'pengguna_id' => '1'
            ]);
    }
}
