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


<div class="card mb-6">
    <div class="card-header">
        <h5 class="mb-0"><strong>Equipment Create</strong></h5>
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
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="tools_category_id">Tools Category</label>
                    <select id="tools_category_id" name="tools_category_id" class="form-select">
                        <option value="">Select</option>
                        @foreach ($toolsCategories as $toolsCategory)
                        <option value="{{ $toolsCategory->id }}">{{ $toolsCategory->nama_peralatan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="fasilitas" class="form-label">Fasilitas</label>
                    <input type="text" class="form-control" id="fasilitas" name="fasilitas" placeholder="Fasilitas" />
                </div>
                <div class="col-md-6">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" />
                </div>
                <div class="col-md-6">
                    <label for="kapasitas" class="form-label">Kapasitas</label>
                    <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas" />
                </div>
                <div class="col-md-6">
                    <label for="kondisi" class="form-label">Kondisi</label>
                    <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="Kondisi" />
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn btn-primary me-3">Save</button>
                <a href="{{ route('admin.equipt.index') }}" class="btn btn-outline-secondary"> Cancel </a>
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
<!-- Scripts -->
@endsection