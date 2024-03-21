<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ubah data</title>
    <a href="/user">kembali</a>
</head>
<h1>form ubah data user</h1>
<form action="/user/ubah_simpan/{{ $data->user_id }}" method="post">
    {{ csrf_field() }}

    <label>username</label>
    <input type="text" name="username" placeholder="masukkan username" value="{{ $data->username }}">
    <br>
    <label>Nama</label>
    <input type="text" name="nama" placeholder="masukkan nama" value="{{ $data->nama }}">
    <br>
    <label>password</label>
    <input type="password" name="password" placeholder=" masukkan password" value="{{ $data->password }}">
    <br>
    <label>level id</label>
    <input type="number" name="level_id" placeholder="masukkan level id" value="{{ $data->level_id }}">
    <br><br>
    <input type="submit" class="btn btn-success" value="Ubah">
</form>
</body>

</html>
