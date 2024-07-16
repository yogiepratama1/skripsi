<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Laporan;
use App\Models\AssetStatus;
use App\Models\AssetCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\PermintaanSeeder;

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
                'name' => 'Bani Sidik',
                'email' => 'penyidik@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'penyidik'
            ],
            [
                'name' => 'Staff Administrasi',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08625341722',
                'alamat' => 'Jakarta',
                'role' => 'admin'
            ],
            [
                'name' => 'Bani Opsnal',
                'email' => 'kepalapenyidikan@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08625341722',
                'alamat' => 'Jakarta',
                'role' => 'kepalapenyidikan'
            ],
            [
                'name' => 'Kepala Unit',
                'email' => 'kepalaresmob@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08525341721',
                'alamat' => 'Jakarta',
                'role' => 'kepalaresmob'
            ]
        ]);
        $this->call(PermintaanSeeder::class);        
    }
}
