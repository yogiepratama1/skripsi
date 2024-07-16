<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permintaan;
use Illuminate\Support\Str;

class PermintaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummyData = [
            [
                'nama_penyidik' => 'John Doe',
                'nama_tersangka' => 'Jane Smith',
                'saksi' => 'Witness 1',
                'bukti' => 'Bukti A',
                'berkas' => 'http://example.com/berkas-a',
                'kelengkapan' => true,
            ],
            [
                'nama_penyidik' => 'Alice Johnson',
                'nama_tersangka' => 'Bob Brown',
                'saksi' => 'Witness 2',
                'bukti' => 'Bukti B',
                'berkas' => 'http://example.com/berkas-b',
                'kelengkapan' => false,
            ],
            // Add more dummy data as needed
        ];

        foreach ($dummyData as $data) {
            Permintaan::create($data);
        }
    }
}
