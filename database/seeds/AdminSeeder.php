<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'admin_id' => 'A001',
            'firstname' => 'Danial',
            'lastname' => 'Adzhar',
            'email' => 'admin@roketez.com',
            'password' => Hash::make('@dmin'),
            'role' => 'Administrator',
        ]);
    }
}
