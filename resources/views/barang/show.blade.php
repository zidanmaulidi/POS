@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($barang)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $barang->barang_id }}</td>
                    </tr>
                    <tr>
                        <th>kategori id</th>
                        <td>{{ $barang->kategori_id }}</td>
                    </tr>
                    <tr>
                        <th>barang nama</th>
                        <td>{{ $barang->barang_nama }}</td>
                    </tr>
                    <tr>
                        <th>barang kode</th>
                        <td>{{ $barang->barang_kode }}</td>
                    </tr>
                    <tr>
                        <th>harga beli</th>
                        <td>{{ $barang->harga_beli }}</td>
                    </tr>
                    <tr>
                        <th>harga jual</th>
                        <td>{{ $barang->harga_jual }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ url('barang') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
    <!-- Tambahkan tautan CSS khusus jika diperlukan -->
@endpush

@push('js')
    <!-- Tambahkan tautan JavaScript khusus jika diperlukan -->
@endpush
