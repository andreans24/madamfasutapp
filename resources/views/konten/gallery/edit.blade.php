@extends('layouts.dashboard')
@section('content')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0" style="font-weight: bold">Gallery Edit</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                            <option disabled>Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $gallery->category_id ? 'selected' :
                                '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Title Input -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="title">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{ $gallery->title }}" />
                    </div>
                </div>
                {{-- Latitude & Longitude --}}
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="latitude">Latitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="latitude" name="latitude"
                            value="{{ $gallery->latitude }}" />
                    </div>
                </div>

                <!-- Longitude Input -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="longitude">Longitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="longitude" name="longitude"
                            value="{{ $gallery->longitude }}" />
                    </div>
                </div>

                <!-- Image Input -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="formFileMultiple">Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="image" name="image" />
                        <h6>Max 3 Mb</h6>
                        @if ($gallery->image)
                        <p>Current Image:</p>
                        <img src="{{ asset($gallery->image) }}" alt="Gallery Image" width="150">
                        @endif
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection