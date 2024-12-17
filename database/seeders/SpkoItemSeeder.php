<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpkoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spko_items')->insert([
            ['idm' => 1, 'idm_spko' => 1, 'ordinal' => 1, 'id_product' => 247, 'qty' => 46],
            ['idm' => 2, 'idm_spko' => 1, 'ordinal' => 1, 'id_product' => 247, 'qty' => 55],
            ['idm' => 3, 'idm_spko' => 1, 'ordinal' => 1, 'id_product' => 260, 'qty' => 3],
            ['idm' => 4, 'idm_spko' => 1, 'ordinal' => 1, 'id_product' => 246, 'qty' => 48],
            ['idm' => 5, 'idm_spko' => 1, 'ordinal' => 1, 'id_product' => 246, 'qty' => 2],
            ['idm' => 6, 'idm_spko' => 1, 'ordinal' => 1, 'id_product' => 246, 'qty' => 100],
            ['idm' => 7, 'idm_spko' => 1, 'ordinal' => 2, 'id_product' => 2232, 'qty' => 150],
        ]);




    }
}
