@extends('layout.app')

@section('subtitle', 'manager')
@section('content_header_title', 'home')
@section('content_header_subtitle', 'manager')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>login sebagai: <?php echo Auth::user()->level_id == 1 ? 'admin' : 'manager'; ?></h1>
                <a href="{{ route('logout') }}">logout</a>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
