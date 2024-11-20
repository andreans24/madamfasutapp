@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Bollard in Gallery: "<strong>{{ $gallery->title }}</strong>"</h3>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.bollard.create') }}" class="btn btn-primary">Create</a>
            <a href="{{ route('admin.bollard.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    <div class="card-body">
        @forelse ($bollards as $bollard)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0">Fasilitas: {{ $bollard->fasilitas }}</h6>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <!-- Tombol Edit -->
                        <a class="dropdown-item" href="{{ route('admin.bollard.edit', $bollard->id) }}">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
                        <!-- Tombol Delete -->
                        <form id="delete-form-{{ $bollard->id }}"
                            action="{{ route('admin.bollard.destroy', $bollard->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item"
                                onclick="event.preventDefault(); confirmDelete({{ $bollard->id }})">
                                <i class="bx bx-trash me-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <strong>Baik:</strong> {{ $bollard->baik }} <br>
                    <strong>Rusak:</strong> {{ $bollard->rusak }} <br>
                </p>
            </div>
        </div>
        @empty
        <p class="text-muted">No bollard available in this gallery. Please Create</p>
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