@extends('layout.app')
@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')
@section('content_body')
    <p>welcome this beautiful admin panel</p>
@stop

@push('css')
@endpush
@push('js')
    <script>
        console.log('Hi, Im using laravel-AdminLTE package!')
    </script>
@endpush
