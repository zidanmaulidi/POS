<?php

namespace App\Http\Controllers;

use App\Models\levelModel;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Monolog\Level;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller

{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'daftar user',
            'list' => ['home', 'user']
        ];
        $page = (object)[
            'title' => 'datftar user yang terdaftar dalam sistem'
        ];
        $level = LevelModel::all();
        $activeMenu = 'user';
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }
    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'tambah user',
            'list' => ['Home', 'User', 'Tambah']
        ];
        $page = (object)[
            'title' => 'tambah user baru'
        ];
        $level = levelModel::all();
        $activeMenu = 'user';
        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer'
        ]);
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);
        return redirect('/user')->with('succes', 'data berhasil disimpan');
    }
    public function show($id)
    {
        $user = UserModel::with('level')->find($id);
        $breadcrumb = (object)[
            'title' => 'detail user',
            'list' => ['Home', 'User', 'Detail'],

        ];
        $page = (object)[
            'title' => 'detail user'
        ];
        $activeMenu = 'user';
        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }
    public function edit($id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();
        $breadcrumb = (object)[
            'title' => 'edit user',
            'list' => ['Home', 'User', 'Edit']
        ];
        $page = (object)[
            'title' => 'edit user'
        ];
        $activeMenu = 'user';
        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
                'nama' => 'required|string|max:100',
                'password' => 'nullable|min:5',
                'level_id' => 'required|integer'
            ]
        );
        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id
        ]);
        return redirect('/user')->with('succes', 'data user berhasil diubah');
    }
    public function destroy($id)
    {
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'data user tidak ditemukan');
        }
        try {
            UserModel::destroy($id);
            return redirect('/user')->with('succes', 'data user berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('user', 'data user gagal dihapus karena  masih terkait dengan tabel ini');
        }
    }
    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }
        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                $btn = '<a href="' . route('user.show', $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . route('user.edit', $user->user_id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('user.destroy', $user->user_id) . '">' .
                    csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
