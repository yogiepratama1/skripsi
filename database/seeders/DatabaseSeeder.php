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
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
                'name' => 'Tim Pemasaran',
                'email' => 'pemasaran@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'pemasaran'
            ],
            [
                'name' => 'Tim Percetakan',
                'email' => 'percetakan@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'percetakan'
            ],
            [
                'name' => 'Tim Finishing',
                'email' => 'finishing@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'finishing'
            ],
            [
                'name' => 'Co Founder',
                'email' => 'cofounder@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'cofounder'
            ],
            [
                'name' => 'Founder',
                'email' => 'founder@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'founder'
            ],
        ]);
    }
}
