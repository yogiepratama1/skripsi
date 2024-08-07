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
                'name' => 'Pelanggan',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'user'
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08625341722',
                'alamat' => 'Jakarta',
                'role' => 'admin'
            ],
            [
                'name' => 'Tim Produksi',
                'email' => 'produksi@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08625341722',
                'alamat' => 'Jakarta',
                'role' => 'produksi'
            ],
            [
                'name' => 'Kurir',
                'email' => 'kurir@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08525341721',
                'alamat' => 'Jakarta',
                'role' => 'kurir'
            ],
            [
                'name' => 'Manajer',
                'email' => 'manajer@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08525341721',
                'alamat' => 'Jakarta',
                'role' => 'manajer'
            ],
        ]);

        
        Asset::create([
            'name' => 'Kalender',
            'harga' => 50000
        ]);
        Asset::create([
            'name' => 'Kaos',
            'harga' => 50000
        ]);
        Asset::create([
            'name' => 'Sablon Kaos',
            'harga' => 50000
        ]);
        Permintaan::create([
            'user_id' => 1,
            'nama_pelanggan' => 'Roy Batty',
            'email_pelanggan' => 'roy@gmail.com',
            'alamat_pelanggan' => 'Jakarta',
            'jumlah' => 10,
            'produk' => 'Kalender',
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
