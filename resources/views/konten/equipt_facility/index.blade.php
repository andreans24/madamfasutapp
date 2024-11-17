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
        <h5 class="card-header">Equipment List</h5>
        <a href="{{ route('admin.equipt.create') }}" class="btn rounded-pill btn-primary">Create</a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Fasilitas</th>
                    <th>Unit</th>
                    <th>Kondisi</th>
                    <th>Category</th>
                    <th>Gallery</th>
                    <th>Tools Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </a>
                                <form id="delete-form- " action="" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item"
                                        onclick="event.preventDefault(); confirmDelete()">
                                        <i class="bx bx-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!--/ Responsive Table -->

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