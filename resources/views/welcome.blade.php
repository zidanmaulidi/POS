@extends('adminlte::page')
@section('title', 'm_level')
@section('content_header')
    <h1>m_level</h1>
@stop
@section('content')
    <div class="card-body">
        <form>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Level id :</label><br>
                        <input type="text" name="Level id" placeholder="masukkan Level id">
                        <br>
                        <label>Level Kode :</label><br>
                        <input type="text" name="Level Kode" placeholder="masukkan Level Kode">
                        <br>
                        <label>Nama Level :</label><br>
                        <input type="Nama Level" name="Nama Level" placeholder=" masukkan Nama Level">
                        <br>
                        <br><br>
                        <button type = "submit" class ="btn btn-info">Submit </button>
                    </div>
                @stop
                @section('css')
                    {{-- Add here extra stylesheets --}}
                    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
                @stop
                @section('js')
                    <script>
                        console.log("Hi, I'm using the Laravel-AdminLTE package!");
                    </script>
                @stop
