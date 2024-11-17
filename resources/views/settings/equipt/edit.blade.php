@extends('layouts.dashboard')
@section('content')
<div class="col-xxl">
    <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0" style="font-weight: bold;">Edit Equipment</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.tools.update', $toolsCategories->id) }}" method="POST"
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

                <!-- Title Input -->
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label" for="title">Nama Peralatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_peralatan" name="nama_peralatan"
                            placeholder="Isi Nama Peralatan"
                            value="{{ old('nama_peralatan', $toolsCategories->nama_peralatan) }}" />
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.tools.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection