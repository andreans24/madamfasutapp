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
        <h3 class="card-header">Bollard List</h3>
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
                    <a class="dropdown-item" href="{{ route('admin.bollard.index') }}">All Categories </a>
                </li>
                @foreach ($categories as $category)
                <li>
                    <a class="dropdown-item"
                        href="{{ route('admin.bollard.index', ['category_id' => $category->id]) }}">
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
                <p class="card-text">Click to see all Bollard of this gallery.</p>
                <a href="{{ route('admin.bollard.show', $gallery->id) }}" class="btn btn-primary">View Details</a>
            </div>
            @if ($gallery->facilities->isEmpty())
            <span class="badge rounded-pill bg-danger ms-auto">No Bollard</span>
            @endif
        </div>
        @endforeach
    </div>
</div>

<script>
    function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#71dd37',
        cancelButtonColor: '#ff3e1d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Ganti dengan ID form yang benar
            document.getElementById(`delete-form-${id}`).submit();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Failed to delete',
                text: 'There was an issue with the deletion process',
            });
        }
    });
}

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
        /* Warna teks hijau gelap */
        background-color: #d4edda;
        /* Warna latar hijau lembut */
        border-color: #c3e6cb;
        /* Warna border hijau muda */
        border-radius: 8px;
        /* Membuat border lebih melengkung */
        padding: 15px 20px;
        /* Padding lebih besar untuk kenyamanan */
        font-weight: bold;
        font-size: 1rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Bayangan lembut */
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