<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeleponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
            DB::table('telepon')->insert([
                'nomor_telepon'  => '081234566',
                'pengguna_id' => '1'
            ]);
    }
}
