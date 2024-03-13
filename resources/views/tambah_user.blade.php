<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tambah data</title>
</head>
<h1>form tambah data user</h1>
<form action="/user/tambah_simpan" method="post">
    {{ csrf_field() }}
    <label>username</label>
    <input type="text" name="username" placeholder="masukkan username">
    <br>
    <label>Nama</label>
    <input type="text" name="nama" placeholder="masukkan nama">
    <br>
    <label>password</label>
    <input type="password" name="password" placeholder=" masukkan password">
    <br>
    <label>level id</label>
    <input type="number" name="level_id" placeholder="masukkan level id">
    <br><br>
    <input type="submit" class="btn btn-success" value="Simpan">
</form>
</body>

</html>
