<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('111111'),
            'role'=>'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('111111'),
            'role'=>'user',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'ppn',
            'email' => 'ppn@user.com',
            'password' => Hash::make('111111'),
            'role'=>'ppn',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'name' => 'non ppn',
            'email' => 'non-ppn@user.com',
            'password' => Hash::make('111111'),
            'role'=>'non_ppn',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
