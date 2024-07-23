<?php

namespace Database\Seeders;

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
                'name' => 'Gudang',
                'email' => 'gudang@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08625341722',
                'alamat' => 'Jakarta',
                'role' => 'gudang'
            ],
            [
                'name' => 'Mekanik',
                'email' => 'mekanik@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08625341722',
                'alamat' => 'Jakarta',
                'role' => 'mekanik'
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasir@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08525341721',
                'alamat' => 'Jakarta',
                'role' => 'kasir'
            ],
            [
                'name' => 'Pemilik Bengkel',
                'email' => 'pemilikbengkel@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08213341721',
                'alamat' => 'Jakarta',
                'role' => 'pemilikbengkel'
            ],
            [
                'name' => 'Service Counter',
                'email' => 'servicecounter@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08213341721',
                'alamat' => 'Jakarta',
                'role' => 'servicecounter'
            ],
        ]);

        Asset::create([
            'name' => 'Oli',
            'deskripsi' => 'Oli Motor Matic',
        ]);

        Asset::create([
            'name' => 'Gear Box',
            'deskripsi' => 'Gear Box Motor Matic',
        ]);
        
        Permintaan::create([
            'user_id' => 1,
            'nama_pelanggan' => 'Arif',
            'alamat_pelanggan' => 'Jakarta',
            'motor' => 'Beat FI',
            'keluhan' => 'Ganti Oli',
            'harga' => 50000,
            'status' => 0,
            'tanggal_bayar' => null,
        ]);

        Permintaan::create([
            'user_id' => 1,
            'nama_pelanggan' => 'Budi',
            'alamat_pelanggan' => 'Jakarta',
            'motor' => 'Vario',
            'keluhan' => 'Ganti Oli',
            'harga' => 50000,
            'status' => 2,
            'tanggal_bayar' => null,
            'spareparts' => 'Oli',
        ]);
    }
}
