<?php

namespace Database\Seeders;

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
                'name' => 'Karyawan',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'user'
            ],
            [
                'name' => 'Officer General Services',
                'email' => 'officer@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'officer_services'
            ],
            [
                'name' => 'Manager General Support',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'manager'
            ],
            [
                'name' => 'Officer General Supplies',
                'email' => 'officersupplies@gmail.com',
                'password' => Hash::make('password'),
                'no_telp' => '08725172524',
                'alamat' => 'Jakarta',
                'role' => 'officer_supplies'
            ],
            // [
            //     'name' => 'Kepala Gudang',
            //     'email' => 'kepalagudang@gmail.com',
            //     'password' => Hash::make('password'),
            //     'no_telp' => '08725341723',
            //     'alamat' => 'Jakarta',
            //     'role' => 'hrd'
            // ],
            // [
            //     'name' => 'Owner',
            //     'email' => 'owner@gmail.com',
            //     'password' => Hash::make('password'),
            //     'no_telp' => '08725341723',
            //     'alamat' => 'Jakarta',
            //     'role' => 'owner'
            // ]
        ]);
    }
}
