<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pondok Pesantren Tahfidz Al Quran El Amani Pontianak',
            'email' => 'admin@gmail.com',
            'role_id' => '1',
            'password' => bcrypt('admin123')
        ]);
    }
};