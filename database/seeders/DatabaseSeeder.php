<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kota;
use App\Models\Zona;
use App\Models\Inventaris;
use App\Models\KategoriL;
use App\Models\Peralatan;
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
            'id_kota' => 2,
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
            'id_kota' => 2,
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
        // Kota::create([
        //     'id_zona' => 1,
        //     'nama_kota' => 'Sumatera Utara',
        //     'kode_kota' => 'SU',
        // ]);
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
            'id_zona' => 1,
            'nama_kota' => 'Deli Serdang',
            'kode_kota' => '1207',
        ]);
        Kota::create([
            'id_zona' => 1,
            'nama_kota' => 'Langkat',
            'kode_kota' => '1205',
        ]);
        Kota::create([
            'id_zona' => 2,
            'nama_kota' => 'Simalungun',
            'kode_kota' => '1208',
        ]);
        Kota::create([
            'id_zona' => 2,
            'nama_kota' => 'Tebing Tinggi',
            'kode_kota' => '1276',
        ]);
        Kota::create([
            'id_zona' => 2,
            'nama_kota' => 'Barubara',
            'kode_kota' => '1219',
        ]);
        Kota::create([
            'id_zona' => 2,
            'nama_kota' => 'Serdang Bedagai',
            'kode_kota' => '1218',
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
            'kode_kota' => '1209',
        ]);
        Kota::create([
            'id_zona' => 3,
            'nama_kota' => 'Labuhan Batu Utara',
            'kode_kota' => '1223',
        ]);
        Kota::create([
            'id_zona' => 3,
            'nama_kota' => 'Labuhan Batu',
            'kode_kota' => '1210',
        ]);
        Kota::create([
            'id_zona' => 4,
            'nama_kota' => 'Labuhan Batu Selatan',
            'kode_kota' => '1222',
        ]);
        Kota::create([
            'id_zona' => 4,
            'nama_kota' => 'Padang Lawas Utara',
            'kode_kota' => '1220',
        ]);
        Kota::create([
            'id_zona' => 4,
            'nama_kota' => 'Padang Lawas',
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
        Kota::create([
            'id_zona' => 5,
            'nama_kota' => 'Tapanuli Selatan',
            'kode_kota' => '1203',
        ]);
        Kota::create([
            'id_zona' => 6,
            'nama_kota' => 'Sibolga',
            'kode_kota' => '1273',
        ]);
        Kota::create([
            'id_zona' => 6,
            'nama_kota' => 'Tapanuli Tengah',
            'kode_kota' => '1201',
        ]);
        Kota::create([
            'id_zona' => 6,
            'nama_kota' => 'Tapanuli Utara',
            'kode_kota' => '1202',
        ]);
        Kota::create([
            'id_zona' => 6,
            'nama_kota' => 'Toba',
            'kode_kota' => '1212',
        ]);
        Kota::create([
            'id_zona' => 6,
            'nama_kota' => 'Humbang Hasundutan',
            'kode_kota' => '1216',
        ]);
        Kota::create([
            'id_zona' => 7,
            'nama_kota' => 'Dairi',
            'kode_kota' => '1211',
        ]);
        Kota::create([
            'id_zona' => 7,
            'nama_kota' => 'Pakpak Barat',
            'kode_kota' => '1215',
        ]);
        Kota::create([
            'id_zona' => 7,
            'nama_kota' => 'Samosir',
            'kode_kota' => '1217',
        ]);
        Kota::create([
            'id_zona' => 7,
            'nama_kota' => 'Karo',
            'kode_kota' => '1206',
        ]);
        Kota::create([
            'id_zona' => 8,
            'nama_kota' => 'Nias',
            'kode_kota' => '1204',
        ]);
        Kota::create([
            'id_zona' => 8,
            'nama_kota' => 'Nias Selatan',
            'kode_kota' => '1214',
        ]);
        Kota::create([
            'id_zona' => 8,
            'nama_kota' => 'Nias Barat',
            'kode_kota' => '1225',
        ]);
        Kota::create([
            'id_zona' => 8,
            'nama_kota' => 'Nias Utara',
            'kode_kota' => '1224',
        ]);
        Kota::create([
            'id_zona' => 8,
            'nama_kota' => 'Gunung Sitoli',
            'kode_kota' => '1278',
        ]);
        Zona::create([
            'id' => 1,
            'nama_zona' => 'Zona I',
            'kode_zona' => 'ZI',
        ]);
        Zona::create([
            'id' => 2,
            'nama_zona' => 'Zona II',
            'kode_zona' => 'ZII',
        ]);
        Zona::create([
            'id' => 3,
            'nama_zona' => 'Zona III',
            'kode_zona' => 'ZIII',
        ]);
        Zona::create([
            'id' => 4,
            'nama_zona' => 'Zona IV',
            'kode_zona' => 'ZIV',
        ]);
        Zona::create([
            'id' => 5,
            'nama_zona' => 'Zona V',
            'kode_zona' => 'ZV',
        ]);
        Zona::create([
            'id' => 6,
            'nama_zona' => 'Zona VI',
            'kode_zona' => 'ZVI',
        ]);
        Zona::create([
            'id' => 7,
            'nama_zona' => 'Zona VII',
            'kode_zona' => 'ZVII',
        ]);
        Zona::create([
            'id' => 8,
            'nama_zona' => 'Zona VII',
            'kode_zona' => 'ZVIII',
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
        KategoriL::create([
            'nama_kategoril' => 'Makanan',
        ]);
        Category::create([
            'nama_kategori' => 'Alat Sedang',
        ]);
        Category::create([
            'nama_kategori' => 'Kendaraan',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 1,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 2,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 2,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 2,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 2,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 2,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 2,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
        Peralatan::create([
            'id_kota' => 2,
            'nama' => 'Mobil',
            'jumlah' => 1,
            'kategori' => 'Kendaraan',
            'sumber_dana_peralatan' => 'asasa',
            'tahun' => '2020-10-10',
        ]);
    }
}
