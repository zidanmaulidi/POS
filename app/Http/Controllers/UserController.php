<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Monolog\Level;

class UserController extends Controller

{
    public function index()
    {
        $user = UserModel::with('Level')->get();

        return view('user', ['data' => $user]);
        // $user = UserModel::create([
        //     'username' => 'manager11',
        //     'nama' => 'manager11',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);
        // $user->username = 'manager12';
        // $user->save();
        // $user->wasChanged();
        // $user->wasChanged('username');
        // $user->wasChanged(['username', 'level_id']);
        // $user->wasChanged('nama');
        // dd($user->wasChanged(['nama', 'username']));

        // $user->isClean();
        // $user->isClean('username');
        // $user->isClean('nama');
        // $user->isClean(['nama', 'username']);

        // $user->save();
        // $user->isDirty();
        // $user->isClean();
        // dd($user->isDirty());
    }
    // // public function ShowUser($id, $name)
    // // {

    // //     return view('user', ['id' => $id, 'name' => $name]);
    // // }
    // public function index()
    // {
    //     $user = UserModel::firstOrNew(
    //         [
    //             'username' => 'Manager 33',
    //             'nama' => 'Manager tiga tiga',
    //             'password' => Hash::make(12345),
    //             'level_id' => 2
    //         ],
    //     );
    //     $user->save();
    //     return view('user', ['data' => $user]);
    //     // user = UserModel::where('level_id', 2)->count();
    //     // dd($user);
    //     // return view('user', ['data' => $user]);
    //     // $user = UserModel::where('username', 'manager9')->firstOrFail();
    //     // return view('user', ['data' => $user]);
    //     // $user = UserModel::firstWhere('level_id', 1);
    //     // return view('user', ['data' => $user]);
    //     // $user = UserModel::findOrFail(1);
    //     // return view('user', ['data' => $user]);
    //     // $data = [
    //     //     'username' => 'Manager_Tiga',
    //     //     'nama' => 'Manager 3',
    //     //     'password' => Hash::make('12345'),
    //     //     'level_id' => 2
    //     // ];
    //     // UserModel::create($data);
    //     // // // $data = [
    //     // // //     'nama' => 'pelanggan pertama',
    //     // // // ];
    //     // // // UserModel::where('username', 'customer-1')->update($data);

    // }
    public function tambah()
    {
        return view('tambah_user');
    }
    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);
        return redirect('/user');
    }
    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }
    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);
        $user->username =  $request->username;
        $user->nama =  $request->nama;
        $user->password =  Hash::make('$request->password');
        $user->level_id =  $request->level_id;
        $user->save();
        return redirect('/user');
    }
    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        return redirect('/user');
    }
}
