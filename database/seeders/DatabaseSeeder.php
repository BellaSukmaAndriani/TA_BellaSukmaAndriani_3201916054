<?php

namespace Database\Seeders;

use App\Models\Donasi;
use Illuminate\Database\Seeder;

use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    	$this->call(UserSeeder::class);
    	$this->call(JenisSeeder::class);
        

    Donasi::create([
        'nama' => "Bella Sukma",
        'telp' => "08123456789",
        'jumlah' => "1364000",
        'tanggal' => "2023-1-13",
        'keluar' => "0",
        'saldo' => "1364000",
        'jenis_id' => "2"
    ]);
    }
}
