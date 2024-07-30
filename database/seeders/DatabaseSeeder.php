<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\AbsensiSiswa;
use App\Models\Asset;
use App\Models\Permintaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Siswa',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'user'
            ],
            [
                'name' => 'Pembina OSIS',
                'email' => 'pembinaosis@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08625341722',
                'alamat' => 'Jakarta',
                'role' => 'pembinaosis'
            ],
            [
                'name' => 'Guru Piket',
                'email' => 'gurupiket@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08625341722',
                'alamat' => 'Jakarta',
                'role' => 'gurupiket'
            ],
            [
                'name' => 'Wali Kelas',
                'email' => 'walikelas@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08525341721',
                'alamat' => 'Jakarta',
                'role' => 'walikelas'
            ],
        ]);

        
        Asset::create([
            'name' => 'Basket',
            'deskripsi' => 'Olahraga Basket',
            'waktu_dan_jam' => '2024-07-29 17:00:00',
        ]);
        Asset::create([
            'name' => 'Sepak Bola',
            'deskripsi' => 'Olahraga Sepak Bola',
            'waktu_dan_jam' => '2024-07-29 17:00:00',
        ]);
        Asset::create([
            'name' => 'Voli',
            'deskripsi' => 'Olahraga Bola Voli',
            'waktu_dan_jam' => '2024-07-29 16:00:00',
        ]);
        Permintaan::create([
            'user_id' => 1,
            'nama_siswa' => 'Roy Batty',
            'kelas' => 'VII - A',
            'disetujui' => true,
            'eskul' => 'Basket, Sepak Bola',
        ]);
        
        Absensi::create([
            'asset_id' => 1,
            'waktu_dan_jam' => '2024-07-29 17:00:00',
        ]);

        AbsensiSiswa::create([
            'absensi_id' => 1,
            'user_id' => 1,
        ]);

        // Asset::create([
        //     'name' => 'Rantai',
        //     'deskripsi' => 'Rantai Motor',
        //     'harga' => 100000,
        // ]);
        
        // Permintaan::create([
        //     'user_id' => 1,
        //     'nama_pelanggan' => 'Arif',
        //     'alamat_pelanggan' => 'Jakarta',
        //     'motor' => 'Beat FI',
        //     'nomor_polisi' => 'B 1234 ABC',
        //     'keluhan' => 'Rem tidak berfungsi',
        //     'status' => 0,
        //     'tanggal_bayar' => null,
        // ]);

        // Permintaan::create([
        //     'user_id' => 1,
        //     'nama_pelanggan' => 'Budi',
        //     'alamat_pelanggan' => 'Jakarta',
        //     'motor' => 'Vario',
        //     'nomor_polisi' => 'B 4444 ABC',
        //     'keluhan' => 'Suara kasar saat jalan',
        //     'harga' => 50000,
        //     'status' => 2,
        //     'tanggal_bayar' => null,
        //     'spareparts' => 'Rantai',
        // ]);
    }
}
