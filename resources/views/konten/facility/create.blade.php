@extends('layouts.dashboard')
@section('content')
<div class="card mb-6">
    <div class="card-header">
        <h3 class="mb-0"><strong>Facility Create</strong></h3>
    </div>
    {{-- Form --}}
    <div class="card-body pt-4">
        <form id="form" action="{{ route('admin.facility.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="gallery_id">Gallery</label>
                    <select id="gallery_id" name="gallery_id" class="form-select">
                        <option value="">Select</option>
                        {{-- @foreach ($galleries as $gallery)
                        <option value="{{ $gallery->id }}">{{ $gallery->title }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="title">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul" />
                </div>
                <div class="col-md-6">
                    <label for="fasilitas" class="form-label">Fasilitas</label>
                    <input type="text" class="form-control" id="fasilitas" name="fasilitas" placeholder="Fasilitas" />
                </div>
                <div class="col-md-6">
                    <label for="panjang" class="form-label">P (m)</label>
                    <input type="text" class="form-control" id="panjang" name="panjang"
                        placeholder="Panjang dalam meter" />
                </div>
                <div class="col-md-6">
                    <label for="luas" class="form-label">L (m)</label>
                    <input type="text" class="form-control" id="luas" name="luas" placeholder="Lebar dalam meter" />
                </div>
                <div class="col-md-6">
                    <label for="lws" class="form-label">LWS</label>
                    <input type="text" class="form-control" id="lws" name="lws" placeholder="LWS" />
                </div>
                <div class="col-md-6">
                    <label for="luas_m2" class="form-label">Luas (m2)</label>
                    <input type="text" class="form-control" id="luas_m2" name="luas_m2" placeholder="Luas dalam m2" />
                </div>
                <div class="col-md-12">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"
                        placeholder="Keterangan"></textarea>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn btn-primary me-3">Save</button>
                <a href="{{ route('admin.facility.index') }}" class="btn btn-outline-secondary"> Cancel </a>
            </div>
        </form>
        {{-- Akhir Form --}}
    </div>
    <!-- /Account -->
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
            url = url.replace('__categoryId__', categoryId);  // Gantilah '__categoryId__' dengan nilai categoryId

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