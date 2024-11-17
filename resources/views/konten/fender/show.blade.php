@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Fender in Gallery: "<strong>{{ $gallery->title }}</strong>"</h3>
        <a href="{{ route('admin.fender.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        @forelse ($fenders as $fender)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0">Fasilitas: {{ $fender->fasilitas }}</h6>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <!-- Tombol Edit -->
                        <a class="dropdown-item" href="{{ route('admin.fender.edit', $fender->id) }}">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
                        <!-- Tombol Delete -->
                        <form id="delete-form-{{ $fender->id }}"
                            action="{{ route('admin.fender.destroy', $fender->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item"
                                onclick="event.preventDefault(); confirmDelete({{ $fender->id }})">
                                <i class="bx bx-trash me-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <strong>Baik:</strong> {{ $fender->baik }} <br>
                    <strong>Rusak:</strong> {{ $fender->rusak }} <br>
                </p>
            </div>
        </div>
        @empty
        <p class="text-muted">No fender available in this gallery. Please Create</p>
        @endforelse
    </div>
</div>

<!-- Konfirmasi Delete -->
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
                document.getElementById(`delete-form-${id}`).submit();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cancelled',
                    text: 'The facility was not deleted!',
                });
            }
        });
    }
</script>
@endsection