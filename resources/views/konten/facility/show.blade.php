@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title">Facilities in Gallery: "<strong>{{ $gallery->title }}</strong>"</h5>
        <a href="{{ route('admin.facility.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        @forelse ($facilities as $facility)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0">Fasilitas: {{ $facility->fasilitas }}</h6>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <!-- Tombol Edit -->
                        <a class="dropdown-item" href="{{ route('admin.facility.edit', $facility->id) }}">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
                        <!-- Tombol Delete -->
                        <form id="delete-form-{{ $facility->id }}"
                            action="{{ route('admin.facility.destroy', $facility->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item"
                                onclick="event.preventDefault(); confirmDelete({{ $facility->id }})">
                                <i class="bx bx-trash me-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <strong>Panjang:</strong> {{ $facility->panjang }} m<br>
                    <strong>Luas:</strong> {{ $facility->luas_m2 }} m²<br>
                    <strong>LWS:</strong> {{ $facility->lws }}
                </p>
                <p class="card-text">{{ $facility->keterangan ?? 'No Description Available' }}</p>
            </div>
        </div>
        @empty
        <p class="text-muted">No facilities available in this gallery. Please Create</p>
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