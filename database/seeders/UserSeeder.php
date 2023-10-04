<?php

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\User; // Import model User
use Illuminate\Foundation\Auth\User as AuthUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat atau mengambil peran 'admin'
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Membuat pengguna dengan peran 'admin'
        $adminUser = ModelsUser::create([
            'name' => 'Masjid Kapal Munzalan Indonesia',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $adminUser->assignRole('admin');

        // Membuat pengguna dengan peran 'user'
        $user = ModelsUser::create([
            'name' => 'User Bukan Admin',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');

        // Tambahkan pengguna lain sesuai kebutuhan Anda
    }
}