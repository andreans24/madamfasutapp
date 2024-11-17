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
        <h3 class="card-header">Galleries List</h3>
        <a href="{{ route('admin.gallery.create') }}" class="btn rounded-pill btn-primary">Create</a>
    </div>
    <div class="row mt-4">
        @foreach ($galleries as $gallery)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <img class="img-fluid" src="{{ asset($gallery->image) }}" alt="Gallery Image" />
                <div class="card-body">
                    <h5 class="card-title">{{ $gallery->title }}</h5>
                    <h6 class="card-subtitle text-muted">{{ $gallery->category->name }}</h6>
                    <div class="mt-3">
                        <a href="{{ route('admin.gallery.edit', $gallery->id) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST"
                            style="display: inline-block;" id="delete-form-{{ $gallery->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="confirmDelete({{ $gallery->id }})">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // Popup Konfirmasi Delete
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                // text: "klik Yes jika ingin menghapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#71dd37',
                cancelButtonColor: '#ff3e1d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengonfirmasi, submit form untuk menghapus data
                    document.getElementById(`delete-form-${id}`).submit();
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