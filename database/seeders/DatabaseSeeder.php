<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Permintaan;
use App\Models\PermintaanUser;
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
                'name' => 'Peserta Pelatihan',
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
                'name' => 'Recruitment & Appraisal Supervisor',
                'email' => 'recruitment@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08625341722',
                'alamat' => 'Jakarta',
                'role' => 'recruitment'
            ],
            [
                'name' => 'Penyelenggara Pelatihan',
                'email' => 'penyelenggara@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08525341721',
                'alamat' => 'Jakarta',
                'role' => 'penyelenggara'
            ],
            [
                'name' => 'Andi',
                'email' => 'andi@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'user'
            ],
            [
                'name' => 'Rudi',
                'email' => 'rudi@gmail.com',
                'password' => Hash::make('password'), // You can change 'password' to the desired default password for all users
                'no_telp' => '08152718326',
                'alamat' => 'Jakarta',
                'role' => 'user'
            ],

        ]);
        
        Permintaan::create([
            'user_id' => 2,
            'judul' => 'Pelatihan Mesin Genset',
            'deskripsi' => 'Tata cara penggunaan mesin genset sesuai SOP',
            'tanggal_pelatihan' => Carbon::now(),
            'status' => 'Pelatihan Selesai'
        ]);

        PermintaanUser::create([
            'permintaan_id' => 1,
            'user_id' => 1,
            'feedback' => 'Pelatihan sangat membantu dan informatif',
            'kehadiran' => 'Hadir'
        ]);
        
        Permintaan::create([
            'user_id' => 2,
            'judul' => 'Pelatihan Mesin Cooling',
            'deskripsi' => 'Tata cara penggunaan mesin cooling sesuai SOP',
            'tanggal_pelatihan' => Carbon::now()->addDays(1),
            'status' => 'Menunggu Persetujuan'
        ]);

        PermintaanUser::create([
            'permintaan_id' => 2,
            'user_id' => 1,
            'feedback' => '',
            'kehadiran' => 'Belum Hadir'
        ]);
    }
}
