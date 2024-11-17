@extends('layouts.dashboard')
@section('content')
<div class="card mb-6">
    <div class="card-header">
        <h3 class="mb-0"><strong>Edit Fender</strong></h3>
    </div>
    {{-- Form --}}
    <div class="card-body pt-4">
        <form id="form" action="{{ route('admin.fender.update', $fender->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Metode PUT untuk update --}}
            <div class="row g-6">
                {{-- Notifikasi error --}}
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
                </div>
                @endif

                {{-- Menampilkan error validation per field --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="col-md-6">
                    <label class="form-label" for="category_id">Category</label>
                    <select id="category_id" name="category_id" class="form-select">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $fender->category_id == $category->id ? 'selected' : ''
                            }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="gallery_id">Gallery</label>
                    <select id="gallery_id" name="gallery_id" class="form-select">
                        <option value="">Select</option>
                        @foreach ($galleries as $gallery)
                        <option value="{{ $gallery->id }}" {{ $fender->gallery_id == $gallery->id ? 'selected' : '' }}>
                            {{ $gallery->title }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fasilitas">Fasilitas</label>
                    <input type="text" name="fasilitas" id="fasilitas" class="form-control"
                        value="{{ old('fasilitas', $fender->fasilitas) }}">
                </div>

                <div class="form-group">
                    <label for="baik">Baik</label>
                    <input type="number" name="baik" id="baik" class="form-control"
                        value="{{ old('baik', $fender->baik) }}">
                </div>

                <div class="form-group">
                    <label for="rusak">Rusak</label>
                    <input type="number" name="rusak" id="rusak" class="form-control"
                        value="{{ old('rusak', $fender->rusak) }}">
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn btn-primary me-3">Save changes</button>
                <a href="{{ route('admin.fender.index') }}" class="btn btn-outline-secondary"> Cancel </a>
            </div>
        </form>

    </div>
</div>

<script>
    document.getElementById('category_id').addEventListener('change', function() {
        var categoryId = this.value;
        var galleryDropdown = document.getElementById('gallery_id');

        // Bersihkan opsi sebelumnya
        galleryDropdown.innerHTML = '<option value="">Select</option>';

        if (categoryId) {
            // Membentuk URL secara dinamis menggunakan Blade untuk mendapatkan URL route
            var url = `{{ route('admin.galleries.byCategory', ['category_id' => '__categoryId__']) }}`;
            url = url.replace('__categoryId__', categoryId);

            // Debugging: lihat URL yang dibentuk
            console.log(url);

            // Fetch data dari server
            fetch(url)
            .then(response => response.json())
            .then(galleries => {
                // Tambah opsi baru ke dropdown gallery
                galleries.forEach(gallery => {
                    var option = document.createElement('option');
                    option.value = gallery.id;
                    option.textContent = gallery.title;
                    galleryDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching galleries;', error));
        }
    });
</script>
@endsection