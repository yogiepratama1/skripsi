<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Permintaan;
use Carbon\Carbon;
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
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'user'
            ],
            [
                'name' => 'Tim Pengecekan Proposal',
                'email' => 'proposal@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08625341722',
                'alamat' => 'Jakarta',
                'role' => 'proposal'
            ],
            [
                'name' => 'Administrasi',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08525341721',
                'alamat' => 'Jakarta',
                'role' => 'admin'
            ],
            [
                'name' => 'Tim Monitoring',
                'email' => 'monitoring@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08213341721',
                'alamat' => 'Jakarta',
                'role' => 'monitoring'
            ],
            [
                'name' => 'Manajer',
                'email' => 'manajer@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08213341721',
                'alamat' => 'Jakarta',
                'role' => 'manajer'
            ],
        ]);

        Asset::create([
            'name' => 'Merchandise',
            'deskripsi' => 'Merchandise',
            'harga' => 10,
        ]);

        Asset::create([
            'name' => 'Speaker',
            'deskripsi' => 'Speaker',
            'harga' => 10,
        ]);
        Asset::create([
            'name' => 'Media',
            'deskripsi' => 'Media',
            'harga' => 10,
        ]);
        
        Permintaan::create([
            'user_id' => 1,
            'nama_pelanggan' => 'Arif',
            'alamat_pelanggan' => 'Konser Amal',
            'tanggal_bayar' => Carbon::now(),
            'keluhan' => 'Merchandise, Media, Speaker',
            'motor' => 2000000,
            'status' => 0,
            'status_acara' => 0,
            'nomor_polisi' => 'drive.google.com/123'
        ]);

        Permintaan::create([
            'user_id' => 1,
            'nama_pelanggan' => 'Arif',
            'alamat_pelanggan' => 'Konser Masjid',
            'tanggal_bayar' => Carbon::now(),
            'keluhan' => 'Speaker',
            'motor' => 2000000,
            'status' => 1,
            'status_acara' => 2,
            'nomor_polisi' => 'drive.google.com/123'
        ]);

    }
}
