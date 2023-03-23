<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole;
use Carbon\Carbon;


class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole =  [
            [
                'role_id' => 1,
                'role_name' => 'Quản trị hệ thống',
                'created_at' => Carbon::now(),
            ],
        ];

        UserRole::insert($userRole);
    }
}
