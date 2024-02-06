<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\AssetStatus;
use App\Models\AssetCategory;
use App\Models\Laporan;
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
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
                'name' => 'Pengguna',
                'email' => 'pelanggan@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'user'
            ],
            [
                'name' => 'Front Desk',
                'email' => 'frontdesk@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'frontdesk'
            ],
            [
                'name' => 'gudang',
                'email' => 'gudang@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'gudang'
            ],
            [
                'name' => 'mekanik',
                'email' => 'mekanik@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'mekanik'
            ],
            [
                'name' => 'direktur',
                'email' => 'direktur@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'direktur'
            ],
        ]);
    }
}
