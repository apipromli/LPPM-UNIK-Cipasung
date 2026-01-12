@extends('admin.layouts.app')

@section('title', 'Edit Layanan')

@section('content')
<div class="page-header">
    <h1>Edit Layanan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Layanan</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit Layanan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="type" class="form-label">Jenis Layanan <span class="text-danger">*</span></label>
                        <select class="form-select @error('type') is-invalid @enderror"
                            id="type" name="type" required>
                            <option value="">Pilih Jenis</option>
                            <option value="penelitian" {{ old('type', $service->type) == 'penelitian' ? 'selected' : '' }}>Penelitian</option>
                            <option value="pengabdian" {{ old('type', $service->type) == 'pengabdian' ? 'selected' : '' }}>Pengabdian</option>
                            <option value="kerjasama" {{ old('type', $service->type) == 'kerjasama' ? 'selected' : '' }}>Kerjasama</option>
                        </select>
                        @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ old('title', $service->title) }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon Bootstrap</label>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror"
                            id="icon" name="icon" value="{{ old('icon', $service->icon) }}"
                            placeholder="Contoh: book, people, handshake">
                        <small class="text-muted">Lihat icon di <a href="https://icons.getbootstrap.com" target="_blank">Bootstrap Icons</a></small>
                        @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="order" class="form-label">Urutan Tampilan</label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror"
                            id="order" name="order" value="{{ old('order', $service->order) }}" min="0">
                        @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="url" class="form-control @error('link') is-invalid @enderror"
                            id="link" name="link" value="{{ old('link', $service->link) }}" placeholder="https://...">
                        @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description" rows="6" required>{{ old('description', $service->description) }}</textarea>
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
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
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
    CKEDITOR.replace('description');
</script>
@endpush