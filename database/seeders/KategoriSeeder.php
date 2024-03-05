<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => '1',
                'kategori_kode' => 'k1',
                'kategori_nama' => 'elektronik'
            ],
            [
                'kategori_id' => '2',
                'kategori_kode' => 'k2',
                'kategori_nama' => 'makanan dan minuman'
            ],
            [
                'kategori_id' => '3',
                'kategori_kode' => 'k3',
                'kategori_nama' => 'perabotan rumah tangga'
            ],
            [
                'kategori_id' => '4',
                'kategori_kode' => 'k4',
                'kategori_nama' => 'pakaian'
            ],
            [
                'kategori_id' => '5',
                'kategori_kode' => 'k5',
                'kategori_nama' => 'perlengkapan sekolah'
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
