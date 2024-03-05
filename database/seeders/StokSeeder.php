<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'stok_id' => 1,
                'barang_id' => 1,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-5',
                'stok_jumlah' => '10',
            ],
            [
                'stok_id' => 2,
                'barang_id' => 2,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-5',
                'stok_jumlah' => '115',
            ],
            [
                'stok_id' => 3,
                'barang_id' => 3,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-5',
                'stok_jumlah' => '20',
            ],
            [
                'stok_id' => 4,
                'barang_id' => 4,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-5',
                'stok_jumlah' => '14',
            ],
            [
                'stok_id' => 5,
                'barang_id' => 5,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-5',
                'stok_jumlah' => '56',
            ],
            [
                'stok_id' => 6,
                'barang_id' => 6,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-5',
                'stok_jumlah' => '32',
            ],
            [
                'stok_id' => 7,
                'barang_id' => 7,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-5',
                'stok_jumlah' => '18',
            ],
            [
                'stok_id' => 8,
                'barang_id' => 8,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-5',
                'stok_jumlah' => '70',
            ],
            [
                'stok_id' => 9,
                'barang_id' => 9,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-5',
                'stok_jumlah' => '49',
            ],
            [
                'stok_id' => 10,
                'barang_id' => 10,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-5',
                'stok_jumlah' => '100',
            ],
        ];
        db::table('t_stok')->insert($data);
    }
}
