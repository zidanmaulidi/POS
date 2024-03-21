<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>

<body>
 
    @extends('layout.app')
    @section('subtitle', 'Kategori')
    @section('content_header_title', 'Kategori')
    @section('content_header_subtitle', 'Create')
    @section('content')
        <form action="/kategori/store" method="post">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input type="text" class="form-control" id="kodeKategori" name="kodeKategori"
                        placeholder="masukkan kode kategori">
                </div>
                <div class="form-group">
                    <label for="namaKategori">nama Kategori</label>
                    <input type="text" class="form-control" id="namaKategori" name="namaKategori"
                        placeholder="masukkan nama kategori">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>

        </form>
    @endsection
</body>

</html>
