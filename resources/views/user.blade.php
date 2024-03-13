<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>data user</title>
</head>

<body>
    <h1>data user </h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>nama</th>
            <th>id level pengguna</th>
            <th>kode level</th>
            <th>nama level</th>
            <th>aksi</th>
        </tr>
        @foreach ($data as $d)
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
                <td>{{ $d->level->level_kode }}</td>
                <td>{{ $d->level->level_nama }}</td>
                <td><a href="/user/ubah/{{ $d->user_id }}">ubah</a>| <a
                        href="/user/hapus/{{ $d->user_id }}">hapus</a></td>
            </tr>
        @endforeach
    </table>
</body>

</html>
