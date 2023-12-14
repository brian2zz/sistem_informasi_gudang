<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'id_produk' => 1,
            'no_kartu' => 'JM 1004',
            'nama_produk' => 'AIR FILTER JM 50M / SULLAIR',
            'id_kategori_produk' => '1',
            'satuan' => 'A6003 / 40899',
            'stok' => '200',
        ]);
        DB::table('products')->insert([
            'id_produk' => 2,
            'no_kartu' => 'JM 1005',
            'nama_produk' => 'AIR FILTER 50 HP/ A',
            'id_kategori_produk' => '1',
            'satuan' => '168 -  83 - 210/165215-01',
            'stok' => '200',
        ]);
        DB::table('products')->insert([
            'id_produk' => 3,
            'no_kartu' => 'JM 1003',
            'nama_produk' => 'AIR FILTER JM 30M',
            'id_kategori_produk' => '1',
            'satuan' => 'SA-K8346/C1360',
            'stok' => '200',
        ]);
        
    }
}
