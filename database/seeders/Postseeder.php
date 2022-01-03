<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class Postseeder extends Seeder
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
            DB::table('post')->insert([
                'judul'  =>$faker->judul
                'isi' => $faker->isi
                'slug' => $faker->slug
                'gambar' => $faker->gambar
            ]);
    }
}
