<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(PenggunaSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(AnggotaSeeder::class);
    }
}
