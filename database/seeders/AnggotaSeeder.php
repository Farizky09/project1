<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;
use App\Models\Hadiah;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Anggota::truncate();
        $anggota1 = Anggota::create([
            'name' => 'Ikhsan Luminaiere'
        ]);
        $anggota2 = Anggota::create([
            'name' => 'Ikhsan '
        ]);
      
        Hadiah::truncate();
        $hadiah1 = Hadiah::create([
            'name_hadiah' => 'kapal'
        ]);
        $hadiah2 = Hadiah::create([
            'name_hadiah' => 'mobil'
        ]);
$anggota1->hadiah()->sync($hadiah1->id);
$anggota1->hadiah()->sync($hadiah2->id);
$anggota2->hadiah()->sync($hadiah2->id);
$anggota2->hadiah()->sync($hadiah1->id);
Schema::enableForeignKeyConstraints();
    }
    
}

