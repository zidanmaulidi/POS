@extends('layout.app')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="btn-tambah"
                    style="background-color: rgb(58, 8, 237); width: 120px; border-radius: 10px; text-align: center">
                    <a href="/kategori/create" style=" color:white;">tambah
                        kategori</a>
                </div>
                <div class="card-body">

                    {!! $dataTable->table() !!}
                    

                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
</div>
