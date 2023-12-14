<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Level;
use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Petugas::create([
        //     'nama_petugas' => 'Admin2',
        //     'username' => 'admin3',
        //     'password' => bcrypt('12345'),
        //     'id_level' => 1
        // ]);

        Level::create([
            'level' => 'administrator'
        ]);
        Level::create([
            'level' => 'petugas'
        ]);

        // Masyarakat::create([
        //     'nama_lengkap' => 'cindy',
        //     'username' => 'admin1',
        //     'password' => bcrypt('admin'),
        //     'telp' => '0822222'
        // ]);
    }
}
