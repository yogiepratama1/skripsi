<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\AssetStatus;
use App\Models\AssetCategory;
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
                'name' => 'Sales',
                'email' => 'sales@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'sales'
            ],
            [
                'name' => 'Agustino',
                'email' => 'agustino@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Bogor',
                'role' => 'sales'
            ],
            [
                'name' => 'Administrasi',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Bogor',
                'role' => 'sales'
            ],
            [
                'name' => 'Yanto',
                'email' => 'yanto@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08725172524',
                'alamat' => 'Jakarta',
                'role' => 'sales'
            ],
            [
                'name' => 'Sutomo',
                'email' => 'sutomo@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08725341723',
                'alamat' => 'Bekasi',
                'role' => 'sales'
            ],
            [
                'name' => 'Vendor',
                'email' => 'vendor@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08625341722',
                'alamat' => 'Jakarta',
                'role' => 'vendor'
            ],
            [
                'name' => 'Finance',
                'email' => 'finance@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08525341721',
                'alamat' => 'Jakarta',
                'role' => 'finance'
            ],
            [
                'name' => 'Gudang',
                'email' => 'gudang@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08213341721',
                'alamat' => 'Jakarta',
                'role' => 'gudang'
            ],
        ]);

        AssetCategory::create(['name' => 'Komatsu']);
        AssetCategory::create(['name' => 'Dresta']);
        
        AssetStatus::create(['name' => 'Kendaraan']);
        AssetStatus::create(['name' => 'Barang']);


        Asset::create([
            'name' => 'traktor',
            'harga' => 100000000,
            'deskripsi' => 'alat berat',
            'category_id' => 1, // Replace with the appropriate category_id based on the assetCategories seeder
            'status_id' => 1,   // Replace with the appropriate status_id based on the assetStatus seeder
        ]);

        Asset::create([
            'name' => 'bulldozer',
            'harga' => 120000000,
            'deskripsi' => 'alat berat',
            'category_id' => 2, // Replace with the appropriate category_id based on the assetCategories seeder
            'status_id' => 1,   // Replace with the appropriate status_id based on the assetStatus seeder
        ]);
        
    }
}
