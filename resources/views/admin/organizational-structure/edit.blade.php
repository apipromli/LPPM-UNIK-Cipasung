@extends('admin.layouts.app')

@section('title', 'Edit Struktur Organisasi')

@section('content')
<div class="page-header">
    <h1>Edit Struktur Organisasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.organizational-structures.index') }}">Struktur Organisasi</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit Struktur Organisasi</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.organizational-structures.update', $organizationalStructure) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                    id="title" name="title" value="{{ old('title', $organizationalStructure->title) }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar Struktur</label>
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $organizationalStructure->image) }}"
                        alt="{{ $organizationalStructure->title }}"
                        class="img-thumbnail"
                        style="max-height: 300px;">
                </div>
                <input type="file" class="form-control @error('image') is-invalid @enderror"
                    id="image" name="image" accept="image/*">
                <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                    id="description" name="description" rows="4">{{ old('description', $organizationalStructure->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.organizational-structures.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection