<?php

namespace Database\Seeders;

use App\Models\Prodi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Prodi::create(['name' => 'Teknik Informatika', 'logo' => 'fa-laptop-code', 'description' => 'Program studi yang mempelajari tentang komputer dan teknologi informasi.']);
        Prodi::create(['name' => 'Sistem Informasi', 'logo' => 'fa-database', 'description' => 'Program studi yang mempelajari tentang pengelolaan sistem informasi dalam organisasi.']);
        Prodi::create(['name' => 'Teknik Komputer', 'logo' => 'fa-microchip', 'description' => 'Program studi yang mempelajari tentang perangkat keras komputer dan sistem tertanam.']);
        Prodi::create(['name' => 'Teknologi Informasi', 'logo' => 'fa-network-wired', 'description' => 'Program studi yang mempelajari tentang infrastruktur teknologi informasi dan jaringan komputer.']);
        Prodi::create(['name' => 'Manajemen', 'logo' => 'fa-briefcase', 'description' => 'Program studi yang mempelajari tentang prinsip-prinsip manajemen dan bisnis.']);
    }
}
