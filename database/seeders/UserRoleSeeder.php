<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_roles')->insert([
            'role_name' => 'admin',
            'created_at' => Carbon::Now(),
        ]);

        DB::table('user_roles')->insert([
            'role_name' => 'staff',
            'created_at' => Carbon::Now(),
        ]);
    }
}
