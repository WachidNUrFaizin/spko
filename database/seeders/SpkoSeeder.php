<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpkoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spkos')->insert([
            [
                'id_spko' => 1,
                'remarks' => null,
                'employee' => 1,
                'trans_date' => '2020-08-02',
                'process' => 'Brush',
                'sw' => '2201480010'
            ],
            [
                'id_spko' => 2,
                'remarks' => null,
                'employee' => 2,
                'trans_date' => '2020-05-04',
                'process' => 'Var P',
                'sw' => '2201480034'
            ],
            [
                'id_spko' => 3,
                'remarks' => null,
                'employee' => 3,
                'trans_date' => '2020-01-24',
                'process' => 'Enamel',
                'sw' => '2201530020'
            ],
            [
                'id_spko' => 4,
                'remarks' => null,
                'employee' => 1,
                'trans_date' => '2020-11-14',
                'process' => 'Giling Tarik',
                'sw' => '2201530006'
            ],
            [
                'id_spko' => 5,
                'remarks' => null,
                'employee' => 2,
                'trans_date' => '2020-12-03',
                'process' => 'Potong Cor',
                'sw' => '2201120181'
            ],
        ]);
    }
}
