<?php

namespace App\Http\Controllers;

use App\Models\kategoriModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class kategoriController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar kategori',
            'list' => ['Home', 'kategori']
        ];
        $page = (object)[
            'title' => 'Daftar kategori yang Terdaftar dalam Sistem'
        ];
        $kategori = kategoriModel::all();
        $activeMenu = 'kategori';
        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $kategoris = kategoriModel::select('kategori_id', 'kategori_nama', 'kategori_kode');

        return DataTables::of($kategoris)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                $btn = '<a href="' . route('kategori.show', $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . route('kategori.edit', $kategori->kategori_id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('kategori.destroy', $kategori->kategori_id) . '">' .
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
            'title' => 'tambah kategori',
            'list' => ['Home', 'kategori', 'Tambah']
        ];
        $page = (object)[
            'title' => 'tambah kategori baru'
        ];
        $kategori = kategoriModel::all();
        $activeMenu = 'kategori';
        return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request)
    {
        $request->validate([

            'kategori_nama' => 'required|string|max:100',
            'kategori_kode' => 'required|string|max:100',

        ]);
        kategoriModel::create([
            'kategori_nama' => $request->kategori_nama,
            'kategori_kode' => $request->kategori_kode,

        ]);
        return redirect('/kategori')->with('succes', 'data berhasil disimpan');
    }
    public function show($id)
    {
        $kategori = kategoriModel::find($id);
        $breadcrumb = (object)[
            'title' => 'Detail kategori',
            'list' => ['Home', 'kategori', 'Detail'],

        ];
        $page = (object)[
            'title' => 'Detail kategori'
        ];
        $activeMenu = 'kategori';
        return view('kategori.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $kategori = kategoriModel::find($id);
        $breadcrumb = (object)[
            'title' => 'Edit kategori',
            'list' => ['Home', 'kategori', 'Edit']
        ];
        $page = (object)[
            'title' => 'Edit kategori'
        ];
        $activeMenu = 'kategori';
        return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'kategori_nama' => 'required|string|max:100',
                'kategori_kode' => 'required|string|max:50',

            ]
        );
        kategoriModel::find($id)->update([
            'kategori_nama' => $request->kategori_nama,
            'kategori_kode' => $request->kategori_kode,

        ]);
        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah');
    }

    public function destroy($id)
    {
        try {
            kategoriModel::destroy($id);
            return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/kategori')->with('error', 'Data kategori gagal dihapus karena masih terkait dengan tabel lain');
        }
    }
}
