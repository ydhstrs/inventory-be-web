<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kota;
use App\Models\Zona;

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

        User::create([
            'name' => 'Admin',
            'id_kota' => 1,
            'email' => 'admin@gmail.com',
            'nip' => '222012121111134',
            'no_hp' => '082134567890',
            'role' => '1',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'Admin2',
            'id_kota' => 3,
            'email' => 'admin2@gmail.com',
            'nip' => '222012121111134',
            'no_hp' => '082134567890',
            'role' => '1',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'nip' => '322012121111134',
            'no_hp' => '085334567890',
            'role' => '2',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'User',
            'id_kota' => 1,
            'email' => 'user@gmail.com',
            'nip' => '122012121111134',
            'no_hp' => '081234567890',
            'role' => '0',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'User2',
            'id_kota' => 3,
            'email' => 'user2@gmail.com',
            'nip' => '122012121111134',
            'no_hp' => '081234567890',
            'role' => '0',
            'password' => bcrypt('admin'),
        ]);
        Kota::create([
            'id_zona' => 1,
            'nama_kota' => 'Medan',
            'kode_kota' => 'M1',
        ]);
        Kota::create([
            'id_zona' => 1,
            'nama_kota' => 'Binjai',
            'kode_kota' => 'B1',
        ]);
        Kota::create([
            'id_zona' => 2,
            'nama_kota' => 'Tebing Tinggi',
            'kode_kota' => 'TB2',
        ]);
        Kota::create([
            'id_zona' => 2,
            'nama_kota' => 'Pematang Siantar',
            'kode_kota' => 'PS3',
        ]);
        Kota::create([
            'id_zona' => 3,
            'nama_kota' => 'Tanjung Balai',
            'kode_kota' => 'TB3',
        ]);
        Kota::create([
            'id_zona' => 3,
            'nama_kota' => 'Asahan',
            'kode_kota' => 'A3',
        ]);
        Kota::create([
            'id_zona' => 4,
            'nama_kota' => 'Labuhan Batu Selatan',
            'kode_kota' => 'LBS4',
        ]);
        Kota::create([
            'id_zona' => 4,
            'nama_kota' => 'Padang Lawas Utara',
            'kode_kota' => 'PUS4',
        ]);
        Kota::create([
            'id_zona' => 5,
            'nama_kota' => 'Padangsidempuan',
            'kode_kota' => 'P5',
        ]);
        Kota::create([
            'id_zona' => 5,
            'nama_kota' => 'Mandailing Natal',
            'kode_kota' => 'MN5',
        ]);
        Zona::create([
            'nama_zona' => 'Zona I',
            'kode_zona' => 'ZI',
        ]);
        Zona::create([
            'nama_zona' => 'Zona II',
            'kode_zona' => 'ZII',
        ]);
        Zona::create([
            'nama_zona' => 'Zona III',
            'kode_zona' => 'ZIII',
        ]);
        Zona::create([
            'nama_zona' => 'Zona IV',
            'kode_zona' => 'ZIV',
        ]);
        Zona::create([
            'nama_zona' => 'Zona V',
            'kode_zona' => 'ZV',
        ]);
    }
}