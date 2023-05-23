<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Masjid Kapal Munzalan Indonesia',
            'email' => 'admin@admin.com',
            'phone_number' => '08123',
            'password' => Hash::make('password'),
            'address' => '123',
            'regency_id' => 6112,
            'province_id' => 61,
            'coordinator' => 'M awal',
        ]);
    }
}
