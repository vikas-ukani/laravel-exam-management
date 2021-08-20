<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'user_type' => 'ADMIN',
            'password' => bcrypt('adminadmin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Accountant',
            'email' => 'accountant@gmail.com',
            'user_type' => 'ACCOUNTANT',
            'password' => bcrypt('accountant'),
        ]);



    }
}
