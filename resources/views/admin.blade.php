@extends('layout.app')

@section('subtitle', 'admin')
@section('content_header_title', 'home')
@section('content_header_subtitle', 'admin')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">tampilan <?php echo Auth::user()->level_id == 1 ? 'Admin' : 'Manager'; ?>
                <div class="card-body">
                    <h1>login sebagai: <?php echo Auth::user()->level_id == 1 ? 'Admin' : 'Manager'; ?></h1>
                    <a href="{{ route('logout') }}">logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
