<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\WorkOrder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Koordinator',
            'email' => 'koordinator@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'koordinator',
        ]);

        User::create([
            'name' => 'Teknisi Rizky',
            'email' => 'rizky@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'teknisi',
        ]);

        User::create([
            'name' => 'Teknisi Mardi',
            'email' => 'mardi@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'teknisi',
        ]);

        User::create([
            'name' => 'Quality Control', 
            'email' => 'qualitycontrol@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'quality_control',
        ]);

        User::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'supervisor',
        ]);

        User::create([
            'name' => 'General Manager',
            'email' => 'generalmanager@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'general_manager',
        ]);

        $this->createPendingWorkOrder();
    }

    private function createPendingWorkOrder()
    {
        Customer::create([
            'name' => 'PT. Maju Jaya',
            'phone' => '081234567890',
            'location' => 'Jl. Raya No. 1',
        ]);
        WorkOrder::create([
            'customer_id' => 1,
            'location' => 'Jl. Raya No. 1',
            'installation_type' => 'Pemasangan Baru',
            'estimated_duration' => 3, // in hours
            'status' => 'Belum Dimulai',
        ]);

        Customer::create([
            'name' => 'CV. Sukses Selalu',
            'phone' => '082345678901',
            'location' => 'Jl. Kebon Jeruk No. 5',
        ]);
        WorkOrder::create([
            'customer_id' => 2,
            'location' => 'Jl. Kebon Jeruk No. 5',
            'installation_type' => 'Pemasangan Baru',
            'estimated_duration' => 2, // in hours
            'status' => 'Belum Dimulai',
        ]);

        Customer::create([
            'name' => 'UD. Sejahtera',
            'phone' => '083456789012',
            'location' => 'Jl. Merdeka No. 7',
        ]);
        WorkOrder::create([
            'customer_id' => 3,
            'location' => 'Jl. Merdeka No. 7',
            'installation_type' => 'Pemasangan Baru',
            'estimated_duration' => 4, // in hours
            'status' => 'Belum Dimulai',
        ]);
    }
}
