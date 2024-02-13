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
                'name' => 'Pelanggan',
                'email' => 'pelanggan@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'user'
            ],
            [
                'name' => 'Barista',
                'email' => 'barista@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'barista'
            ],
            [
                'name' => 'Marketing',
                'email' => 'marketing@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'marketing'
            ],
        ]);

        DB::table('bobots')->insert([
            [
                'nama' => 'Porsi',
                'jenis' => 'Benefit',
                'nilai' => 0.35,
            ],
            [
                'nama' => 'Rasa',
                'jenis' => 'Benefit',
                'nilai' => 0.40,
            ],
            [
                'nama' => 'Harga',
                'jenis' => 'Cost',
                'nilai' => 0.25,
            ],
        ]);

        DB::table('nilai_variables')->insert([
            [
                'nama' => 'Vanilla Latte',
                'jenis' => 'Kopi',
                'porsi' => 2,
                'rasa' => 4,
                'harga' => 2,
                'created_at' => now()
            ],
            [
                'nama' => 'Thai Thea',
                'jenis' => 'Tea',
                'porsi' => 3,
                'rasa' => 2,
                'harga' => 3,
                'created_at' => now()
            ],
            [
                'nama' => 'Cappucino',
                'jenis' => 'Kopi',
                'porsi' => 1,
                'rasa' => 3,
                'harga' => 3,
                'created_at' => now()
            ],
        ]);
    }
}
