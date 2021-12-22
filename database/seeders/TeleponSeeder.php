<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TeleponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 50; $i++){
            DB::table('telepon')->insert([
                'nomor_telepon'  =>$faker->nomor_telepon
                'pengguna_id' => $faker->pengguna_id
            ]);
    }
}
}