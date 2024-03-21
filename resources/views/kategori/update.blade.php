<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update</title>
</head>

<body>

    @extends('layout.app')
    @section('subtitle', 'Kategori')
    @section('content_header_title', 'Kategori')
    @section('content_header_subtitle', 'update')
    @section('content')
        <form action="/kategori/ubah/{{ $data->kategori_id }}" method="post">
            <table>
                {{ csrf_field() }}
                <label>kategori kode</label>
                <input type="text" name="kategori_kode" placeholder="masukkan kategori kode"
                    value="{{ $data->kategori_kode }}">
                <br>
                <label>nama kategori</label>
                <input type="text" name="kategori_nama" placeholder="masukkan nama kategori"
                    value="{{ $data->kategori_nama }}">
                <br><br>
                <input type="submit" class="btn btn-success" value="Ubah">
            </table>

        </form>
    @endsection
</body>
