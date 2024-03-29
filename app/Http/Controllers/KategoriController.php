<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\kategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        $kategori = KategoriModel::all();
        return $dataTable->render('kategori.index', compact('kategori'));
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
        // $data = DB::table('m_kategori')->get();
        // return view('kategori', ['data' => $data]);
    }
    public function create()
    {
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        kategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect('/kategori');
    }
    public function edit($id)
    {
        $kategori = kategoriModel::find($id);
        return view('./kategori/update', ['data' => $kategori]);
    }
    public function ubah($id, Request $request)
    {
        $kategori = kategoriModel::find($id);
        $kategori->kategori_kode =  $request->kategori_kode;
        $kategori->kategori_nama =  $request->kategori_nama;
        $kategori->save();
        return redirect('/kategori');
    }
    public function hapus($id)
    {
        $kategori = kategoriModel::find($id);
        $kategori->delete();
        return redirect('/kategori');
    }
}
