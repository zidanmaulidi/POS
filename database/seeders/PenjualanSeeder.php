<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'budi',
                'penjualan_kode' => 'p1',
                'penjualan_tanggal' => '2024-03-05',
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'agus',
                'penjualan_kode' => 'p2',
                'penjualan_tanggal' => '2024-03-05',

            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'asep',
                'penjualan_kode' => 'p3',
                'penjualan_tanggal' => '2024-03-05',

            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'rudi',
                'penjualan_kode' => 'p4',
                'penjualan_tanggal' => '2024-03-05',

            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'putri',
                'penjualan_kode' => 'p5',
                'penjualan_tanggal' => '2024-03-05',

            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'rizki',
                'penjualan_kode' => 'p6',
                'penjualan_tanggal' => '2024-03-05',

            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'jojo',
                'penjualan_kode' => 'p7',
                'penjualan_tanggal' => '2024-03-05',

            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'bulan',
                'penjualan_kode' => 'p8',
                'penjualan_tanggal' => '2024-03-05',

            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'judi',
                'penjualan_kode' => 'p9',
                'penjualan_tanggal' => '2024-03-05',

            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'udin',
                'penjualan_kode' => 'p10',
                'penjualan_tanggal' => '2024-03-05',

            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
