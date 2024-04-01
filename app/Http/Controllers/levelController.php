<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];
        $page = (object)[
            'title' => 'Daftar Level yang Terdaftar dalam Sistem'
        ];
        $level = LevelModel::all();
        $activeMenu = 'level';
        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $levels = LevelModel::select('level_id', 'level_nama', 'level_kode');

        return DataTables::of($levels)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) {
                $btn = '<a href="' . route('level.show', $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . route('level.edit', $level->level_id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('level.destroy', $level->level_id) . '">' .
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
            'title' => 'tambah level',
            'list' => ['Home', 'level', 'Tambah']
        ];
        $page = (object)[
            'title' => 'tambah level baru'
        ];
        $level = levelModel::all();
        $activeMenu = 'level';
        return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request)
    {
        $request->validate([

            'level_nama' => 'required|string|max:100',
            'level_kode' => 'required|string|max:100',

        ]);
        LevelModel::create([
            'level_nama' => $request->level_nama,
            'level_kode' => $request->level_kode,

        ]);
        return redirect('/level')->with('succes', 'data berhasil disimpan');
    }
    public function show($id)
    {
        $level = LevelModel::find($id);
        $breadcrumb = (object)[
            'title' => 'Detail Level',
            'list' => ['Home', 'Level', 'Detail'],

        ];
        $page = (object)[
            'title' => 'Detail Level'
        ];
        $activeMenu = 'level';
        return view('level.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $level = LevelModel::find($id);
        $breadcrumb = (object)[
            'title' => 'Edit Level',
            'list' => ['Home', 'Level', 'Edit']
        ];
        $page = (object)[
            'title' => 'Edit Level'
        ];
        $activeMenu = 'level';
        return view('level.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'level_nama' => 'required|string|max:100',
                'level_kode' => 'required|string|max:50',

            ]
        );
        LevelModel::find($id)->update([
            'level_nama' => $request->level_nama,
            'level_kode' => $request->level_kode,

        ]);
        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }

    public function destroy($id)
    {
        try {
            LevelModel::destroy($id);
            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terkait dengan tabel lain');
        }
    }
}
