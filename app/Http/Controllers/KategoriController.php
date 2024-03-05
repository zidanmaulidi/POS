<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'insert data berhasil';
        // $row = DB::update('update m_kategori set kategori_nama =? where kategori_kode = ?', ['camilan', 'SNK']);
        // return 'update data berhasi. jumlah data yang diupdate: ' . $row . 'baris';
        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        // return 'delete data berhasil. jumlah data yang dihapus: ' . $row . 'baris';
        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);
    }
}
