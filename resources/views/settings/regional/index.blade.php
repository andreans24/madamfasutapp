@extends('layouts.dashboard')
@section('content')
@if (session('success'))
<div class="alert alert-success" id="successMessage2">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div id="errorMessage2" class="alert alert-danger" role="alert">
    <strong>Error!</strong> {{ session('error') }}
</div>
@endif
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-header">Regional List</h5>
        <a href="{{ route('admin.category.create') }}" class="btn rounded-pill btn-primary">Create</a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>Id</th>
                    <th>Nama Regional</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($category as $cat)
                <tr>
                    <th scope="row">{{ $loop->iteration }} </th>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $cat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.category.destroy', $cat->id) }}" method="POST"
                            style="display: inline-block;" id="delete-form-{{ $cat->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="confirmDelete({{ $cat->id }})">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
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
            var successMessage = document.getElementById('successMessage2');
            var errorMessage = document.getElementById('errorMessage2');
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