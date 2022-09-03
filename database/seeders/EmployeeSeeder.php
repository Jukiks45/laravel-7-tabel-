<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_pembelis')->insert([
            'nama' => 'itsuki',
            'alamat' => 'Pasuruan',
            'notelepon' => '77653',
        ]);
    }
}
