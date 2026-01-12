@extends('admin.layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="page-header">
    <h1>Edit Profil/Sejarah</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.profiles.index') }}">Profil/Sejarah</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit Profil/Sejarah</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.profiles.update', $profile) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                    id="title" name="title" value="{{ old('title', $profile->title) }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Konten <span class="text-danger">*</span></label>
                <textarea class="form-control @error('content') is-invalid @enderror"
                    id="content" name="content" rows="10" required>{{ old('content', $profile->content) }}</textarea>
                @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                @if($profile->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $profile->image) }}" alt="{{ $profile->title }}" class="img-thumbnail" style="max-height: 200px;">
                </div>
                @endif
                <input type="file" class="form-control @error('image') is-invalid @enderror"
                    id="image" name="image" accept="image/*">
                <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.profiles.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endpush