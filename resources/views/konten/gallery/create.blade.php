@extends('layouts.dashboard')
@section('content')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Gallerry create</h5>
            {{-- <small class="text-muted float-end">Default label</small> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- Category Dropdown -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="category_id">Select Category</label>
                    <div class="col-sm-10">
                        <select id="category_id" name="category_id" class="form-select">
                            <option>Category Name</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Title Input -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="title">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="" />
                    </div>
                </div>
                {{-- Latitude & Longitude --}}
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="latitude">Latitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="latitude" name="latitude"
                            placeholder="Enter latitude" />
                    </div>
                </div>

                <!-- Longitude Input -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="longitude">Longitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="longitude" name="longitude"
                            placeholder="Enter longitude" />
                    </div>
                </div>

                <!-- Multiple Files Input -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="formFileMultiple">Upload Gambar</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="image" name="image" multiple />
                        <h6>Max 3 Mb</h6>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection