<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_products')->insert([
            'id_kategori_produk' => 1,
            'nama_kategori_produk' => 'AIR FILTER',
            
        ]);
        DB::table('category_products')->insert([
            'id_kategori_produk' => 2,
            'nama_kategori_produk' => 'OIL FILTER',
            
        ]);
        DB::table('category_products')->insert([
            'id_kategori_produk' => 3,
            'nama_kategori_produk' => 'OIL SEPARATOR',
            
        ]);
        DB::table('category_products')->insert([
            'id_kategori_produk' => 4,
            'nama_kategori_produk' => 'SPAREPART',
            
        ]);
        DB::table('category_products')->insert([
            'id_kategori_produk' => 5,
            'nama_kategori_produk' => 'UNIT',
            
        ]);
        DB::table('category_products')->insert([
            'id_kategori_produk' => 6,
            'nama_kategori_produk' => 'OLI',
            
        ]);
        
    }
}
