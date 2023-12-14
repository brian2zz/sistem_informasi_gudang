<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'id_pembeli' => 1,
            'nama_pembeli' => 'Gudang',
            'status' => 2, 
        ]);
        DB::table('customers')->insert([
            'id_pembeli' => 2,
            'nama_pembeli' => 'ppn1',
            'status' => 0, 
        ]);
        DB::table('customers')->insert([
            'id_pembeli' => 3,
            'nama_pembeli' => 'ppn2',
            'status' => 0, 
        ]);
        DB::table('customers')->insert([
            'id_pembeli' => 4,
            'nama_pembeli' => 'non_ppn1',
            'status' => 1, 
        ]);
        DB::table('customers')->insert([
            'id_pembeli' => 5,
            'nama_pembeli' => 'non_ppn2',
            'status' => 1, 
        ]);
    }
}
