@extends('layouts.dashboard')

@section('content')
@if (session('success'))
<div class="alert alert-success" id="successMessage">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div id="errorMessage" class="alert alert-danger" role="alert">
    <strong>Error!</strong> {{ session('error') }}
</div>
@endif
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-header">Fender List</h3>
        <a href="{{ route('admin.fender.create') }}" class="btn rounded-pill btn-primary">Create</a>
    </div>

    <div class="card-body">
        <!-- Dropdown filter category -->
        <div class="btn-group mb-4">
            <button type="button"
                class="btn btn-secondary dropdown-toggle overflow-hidden d-sm-inline-flex d-block text-truncate"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ request('category_id') ? $categories->find(request('category_id'))->name : 'Select Category'
                }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="{{ route('admin.fender.index') }}">All Categories </a>
                </li>
                @foreach ($categories as $category)
                <li>
                    <a class="dropdown-item" href="{{ route('admin.fender.index', ['category_id' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        @foreach ($galleries as $gallery)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $gallery->title }}</h5>
                <p class="card-text">Click to see all Fender of this gallery.</p>
                <a href="{{ route('admin.fender.show', $gallery->id) }}" class="btn btn-primary">View Details</a>
            </div>
            @if ($gallery->facilities->isEmpty())
            <span class="badge rounded-pill bg-danger ms-auto">No Fender</span>
            @endif
        </div>
        @endforeach
    </div>
</div>

<script>
    //Notifikasi Hilang dalam 3 detik
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        var errorMessage = document.getElementById('errorMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 3000);
</script>

<style>
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        border-radius: 8px;
        padding: 15px 20px;
        font-weight: bold;
        font-size: 1rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 10px;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        border-radius: 8px;
        padding: 15px 20px;
        font-weight: bold;
        font-size: 1rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 10px;
    }
</style>

@endsection