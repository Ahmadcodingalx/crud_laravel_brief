<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AllUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'username' => 'ultim_admin',
            'name' => 'admin_name',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'created_at' => now(),
        ]);
    }
}
