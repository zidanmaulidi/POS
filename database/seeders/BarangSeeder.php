<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'b1',
                'barang_nama' => 'Kaos Polos Putih',
                'harga_beli' => 50000,
                'harga_jual' => 75000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'b2',
                'barang_nama' => 'Sepatu Sneakers Hitam',
                'harga_beli' => 150000,
                'harga_jual' => 250000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'b3',
                'barang_nama' => 'Smartphone Android',
                'harga_beli' => 2000000,
                'harga_jual' => 2500000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'b4',
                'barang_nama' => 'Laptop Intel Core i5',
                'harga_beli' => 5000000,
                'harga_jual' => 6000000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'b5',
                'barang_nama' => 'Nasi Goreng Spesial',
                'harga_beli' => 20000,
                'harga_jual' => 25000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'b6',
                'barang_nama' => 'Teh Botol',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'b7',
                'barang_nama' => 'Set Peralatan Masak Stainless Steel',
                'harga_beli' => 150000,
                'harga_jual' => 200000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'b8',
                'barang_nama' => 'Rak Buku Kayu',
                'harga_beli' => 300000,
                'harga_jual' => 350000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'b9',
                'barang_nama' => 'Pulpen Gel Warna',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'b10',
                'barang_nama' => 'Buku Catatan Spiral A5',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
