<?php

namespace App\Http\Controllers;

use App\Models\StokModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class stokController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar stok',
            'list' => ['Home', 'stok']
        ];
        $page = (object)[
            'title' => 'Daftar stok yang Terdaftar dalam Sistem'
        ];
        $stok = StokModel::all();
        $activeMenu = 'stok';
        return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $stoks = StokModel::select('stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah');

        return DataTables::of($stoks)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stok) {
                $btn = '<a href="' . route('stok.show', $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . route('stok.edit', $stok->stok_id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('stok.destroy', $stok->stok_id) . '">' .
                    csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'tambah stok',
            'list' => ['Home', 'stok', 'Tambah']
        ];
        $page = (object)[
            'title' => 'tambah stok baru'
        ];
        $stok = StokModel::all();
        $activeMenu = 'stok';
        return view('stok.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id', // Menambahkan aturan validasi untuk memastikan barang_id ada dalam tabel m_barang
            'user_id' => 'required|string|max:100',
            'stok_tanggal' => 'required|string|max:100',
            'stok_jumlah' => 'required|string|max:100',


        ]);
        StokModel::create([
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,

        ]);
        return redirect('/stok')->with('succes', 'data berhasil disimpan');
    }
    public function show($id)
    {
        $stok = StokModel::find($id);
        $breadcrumb = (object)[
            'title' => 'Detail stok',
            'list' => ['Home', 'stok', 'Detail'],

        ];
        $page = (object)[
            'title' => 'Detail stok'
        ];
        $activeMenu = 'stok';
        return view('stok.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $stok = StokModel::find($id);
        $breadcrumb = (object)[
            'title' => 'Edit stok',
            'list' => ['Home', 'stok', 'Edit']
        ];
        $page = (object)[
            'title' => 'Edit stok'
        ];
        $activeMenu = 'stok';
        return view('stok.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'activeMenu' => $activeMenu]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id', // Menambahkan aturan validasi untuk memastikan barang_id ada dalam tabel m_barang
            'user_id' => 'required|string|max:100',
            'stok_tanggal' => 'required|string|max:100',
            'stok_jumlah' => 'required|string|max:100',

        ]);

        // Temukan stok berdasarkan ID
        $stok = StokModel::find($id);

        // Jika stok tidak ditemukan, kembalikan pesan kesalahan
        if (!$stok) {
            return redirect('/stok')->with('error', 'stok tidak ditemukan');
        }

        // Perbarui data stok dengan data yang baru
        $updated = $stok->update([
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
        ]);

        // Jika data berhasil diperbarui, kembalikan pesan sukses. Jika tidak, kembalikan pesan kesalahan.
        if ($updated) {
            return redirect('/stok')->with('success', 'Data stok berhasil diubah');
        } else {
            return redirect('/stok')->with('error', 'Tidak ada perubahan yang dilakukan');
        }
    }

    public function destroy($id)
    {
        try {
            StokModel::destroy($id);
            return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/stok')->with('error', 'Data stok gagal dihapus karena masih terkait dengan tabel lain');
        }
    }
}
