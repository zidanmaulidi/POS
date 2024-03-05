<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class levelController extends Controller
{
    public function index()
    {
        // DB::insert('insert into m_level(level_kode,level_nama,created_at)values(?,?,?)', ['cus', 'pelanggan', now()]);
        // return 'insert data baru berhasil';
        //     $row = DB::update('update m_level set level_nama =? where level_kode = ?', ['Customer', 'CUS']);
        //     return 'update data berhasi. jumlah data yang diupdate: ' . $row . 'baris';
        // $row = db::delete('delete from m_level where level_kode = ?', ['cus']);
        // return 'delete data berhasil. jumlah data yang dihapus: ' . $row . 'baris';
        $data = db::select('select * from m_level');
        return view('level', ['data' => $data]);
    }
}
