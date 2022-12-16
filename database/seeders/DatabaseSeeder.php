<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kota;
use App\Models\Zona;
use App\Models\Inventaris;
use App\Models\Tipe_Inventaris;

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
            'status' => 1,
            'password' => bcrypt('admin12345'),
        ]);
        User::create([
            'name' => 'Admin2',
            'id_kota' => 3,
            'email' => 'admin2@gmail.com',
            'nip' => '222012121111134',
            'no_hp' => '082134567890',
            'role' => '1',
            'status' => 1,
            'password' => bcrypt('admin12345'),
        ]);
        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'nip' => '322012121111134',
            'no_hp' => '085334567890',
            'role' => '2',
            'status' => 1,
            'password' => bcrypt('admin12345'),
        ]);
        User::create([
            'name' => 'User',
            'id_kota' => 1,
            'email' => 'user@gmail.com',
            'nip' => '122012121111134',
            'no_hp' => '081234567890',
            'role' => '0',
            'status' => 1,
            'password' => bcrypt('admin12345'),
        ]);
        User::create([
            'name' => 'User2',
            'id_kota' => 3,
            'email' => 'user2@gmail.com',
            'nip' => '122012121111134',
            'no_hp' => '081234567890',
            'role' => '0',
            'password' => bcrypt('admin12345'),
        ]);
        Kota::create([
            'id_zona' => 1,
            'nama_kota' => 'Medan',
            'kode_kota' => '1271',
        ]);
        Kota::create([
            'id_zona' => 1,
            'nama_kota' => 'Binjai',
            'kode_kota' => '1275',
        ]);
        Kota::create([
            'id_zona' => 2,
            'nama_kota' => 'Tebing Tinggi',
            'kode_kota' => '1276',
        ]);
        Kota::create([
            'id_zona' => 2,
            'nama_kota' => 'Pematang Siantar',
            'kode_kota' => '1272',
        ]);
        Kota::create([
            'id_zona' => 3,
            'nama_kota' => 'Tanjung Balai',
            'kode_kota' => '1274',
        ]);
        Kota::create([
            'id_zona' => 3,
            'nama_kota' => 'Asahan',
            'kode_kota' => 'M1',
        ]);
        Kota::create([
            'id_zona' => 4,
            'nama_kota' => 'Labuhan Batu Selatan',
            'kode_kota' => '1222',
        ]);
        Kota::create([
            'id_zona' => 4,
            'nama_kota' => 'Padang Lawas Utara',
            'kode_kota' => '1221',
        ]);
        Kota::create([
            'id_zona' => 5,
            'nama_kota' => 'Padangsidempuan',
            'kode_kota' => '1277',
        ]);
        Kota::create([
            'id_zona' => 5,
            'nama_kota' => 'Mandailing Natal',
            'kode_kota' => '1213',
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
        Inventaris::create([
            'nama_inv' => 'Laptop',
            'id_tipe' => 1,
            'id_kota' => 1,
            'foto_inv' => 'https://media.wired.com/photos/5fb2cc575c9914713ead03de/1:1/w_1358,h_1358,c_limit/Gear-Apple-MacBook-Air-top-down-SOURCE-Apple.jpg',
            'jmlh_inv' => 3,
            'keterangan_inv' => 'Laptop Kantor',
        ]);
        Inventaris::create([
            'nama_inv' => 'Ambulan',
            'id_tipe' => 2,
            'id_kota' => 1,
            'foto_inv' => 'https://pict.sindonews.net/dyn/600/pena/sindo-article/original/2021/07/19/ambulans-apv.jpg',
            'jmlh_inv' => 2,
            'keterangan_inv' => 'Ambulan Urgent',
        ]);
        Inventaris::create([
            'nama_inv' => 'Laptop',
            'id_tipe' => 1,
            'id_kota' => 2,
            'foto_inv' => 'https://media.wired.com/photos/5fb2cc575c9914713ead03de/1:1/w_1358,h_1358,c_limit/Gear-Apple-MacBook-Air-top-down-SOURCE-Apple.jpg',
            'jmlh_inv' => 4,
            'keterangan_inv' => 'Laptop Kantor',
        ]);
        Inventaris::create([
            'nama_inv' => 'Ambulan',
            'id_tipe' => 2,
            'id_kota' => 2,
            'foto_inv' => 'https://pict.sindonews.net/dyn/600/pena/sindo-article/original/2021/07/19/ambulans-apv.jpg',
            'jmlh_inv' => 1,
            'keterangan_inv' => 'Ambulan Urgent Binjai',
        ]);
        Tipe_Inventaris::create([
            'id' => 1,
            'nama_tipe' => 'Peralatan',
            'keterangan_tipe' => 'Mencakup Barang-Barang Elektronik',
        ]);
        Tipe_Inventaris::create([
            'id' => 2,
            'nama_tipe' => 'Logistik',
            'keterangan_tipe' => 'Mencakup Ambulan, Mobil Dinas Dll',
        ]);
    }
}
