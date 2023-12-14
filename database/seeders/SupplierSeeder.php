<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            'id_supplier' => 1,
            'nama_supplier' => 'Gudang',
            'status' => 2, 
        ]);
        DB::table('suppliers')->insert([
            'id_supplier' => 2,
            'nama_supplier' => 'ppn1',
            'status' => 0, 
        ]);
        DB::table('suppliers')->insert([
            'id_supplier' => 3,
            'nama_supplier' => 'ppn2',
            'status' => 0, 
        ]);
        DB::table('suppliers')->insert([
            'id_supplier' => 4,
            'nama_supplier' => 'non_ppn1',
            'status' => 1, 
        ]);
        DB::table('suppliers')->insert([
            'id_supplier' => 5,
            'nama_supplier' => 'non_ppn2',
            'status' => 1, 
        ]);
    }
}
