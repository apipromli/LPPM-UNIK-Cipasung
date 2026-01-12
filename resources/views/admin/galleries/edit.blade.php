@extends('admin.layouts.app')

@section('title', 'Edit Galeri')

@section('content')
<div class="page-header">
    <h1>Edit Galeri</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.galleries.index') }}">Galeri</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit Galeri</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('category') is-invalid @enderror"
                            id="category" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="kegiatan" {{ old('category', $gallery->category) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="penelitian" {{ old('category', $gallery->category) == 'penelitian' ? 'selected' : '' }}>Penelitian</option>
                            <option value="pengabdian" {{ old('category', $gallery->category) == 'pengabdian' ? 'selected' : '' }}>Pengabdian</option>
                            <option value="lainnya" {{ old('category', $gallery->category) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="event_date" class="form-label">Tanggal Kegiatan</label>
                        <input type="date" class="form-control @error('event_date') is-invalid @enderror"
                            id="event_date" name="event_date"
                            value="{{ old('event_date', $gallery->event_date ? $gallery->event_date->format('Y-m-d') : '') }}">
                        @error('event_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                alt="{{ $gallery->title }}"
                                class="img-thumbnail"
                                style="max-height: 150px;">
                        </div>
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                            id="image" name="image" accept="image/*">
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description" rows="4">{{ old('description', $gallery->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection