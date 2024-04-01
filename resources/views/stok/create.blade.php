@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('stok') }}" class="form-horizontal">
                @csrf

        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">barang id</label>
            <div class="col-11">
                <input type="text" class="form-control" id="barang_id" name="barang_id" value="{{ old('barang_id') }}"
                    required>
                @error('barang_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">user id</label>
            <div class="col-11">
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ old('user_id') }}"
                    required>
                @error('user_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">tanggal stok</label>
            <div class="col-11">
                <input type="date" class="form-control" id="stok_tanggal" name="stok_tanggal"
                    value="{{ old('stok_tanggal') }}" required>
                @error('stok_tanggal')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">jumlah stok</label>
            <div class="col-11">
                <input type="text" class="form-control" id="stok_jumlah" name="stok_jumlah"
                    value="{{ old('stok_jumlah') }}" required>
                @error('stok_jumlah')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label"></label>
            <div class="col-11">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a class="btn btn-sm btn-default ml-1" href="{{ url('stok') }}">Kembali</a>
            </div>
        </div>
        </form>
    </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
