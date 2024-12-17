<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'id_employee' => 1,
                'entry_date' => '2020-04-01 05:35:00', // format YYYY-MM-DD HH:MM:SS
                'name' => 'Ahmad Husaini',
                'rank' => 'Operator',
                'gender' => 'L'
            ],
            [
                'id_employee' => 2,
                'entry_date' => '2020-01-25 04:56:00',
                'name' => 'Maya Sofa Nata',
                'rank' => 'Operator',
                'gender' => 'P'
            ],
            [
                'id_employee' => 3,
                'entry_date' => '2020-01-25 05:04:00',
                'name' => 'Rizal Ardiyansah Bintoro',
                'rank' => 'Operator',
                'gender' => 'L'
            ]
        ]);
    }
}
