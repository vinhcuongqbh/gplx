<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Vĩnh Cường',
            'email' => 'vinhcuongqbh@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 1,
            'created_at' => Carbon::Now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Ngọc Mai',
            'email' => 'ngocmaiqbh@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 2,
            'created_at' => Carbon::Now(),
        ]);
    }
}
