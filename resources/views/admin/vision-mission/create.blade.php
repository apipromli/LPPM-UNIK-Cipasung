@extends('admin.layouts.app')

@section('title', 'Tambah Visi & Misi')

@section('content')
<div class="page-header">
    <h1>Tambah Visi & Misi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.vision-missions.index') }}">Visi & Misi</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Tambah Visi & Misi</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.vision-missions.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="vision" class="form-label">Visi <span class="text-danger">*</span></label>
                <textarea class="form-control @error('vision') is-invalid @enderror"
                    id="vision" name="vision" rows="5" required>{{ old('vision') }}</textarea>
                @error('vision')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mission" class="form-label">Misi <span class="text-danger">*</span></label>
                <textarea class="form-control @error('mission') is-invalid @enderror"
                    id="mission" name="mission" rows="10" required>{{ old('mission') }}</textarea>
                <small class="text-muted">Pisahkan setiap misi dengan enter/baris baru</small>
                @error('mission')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('admin.vision-missions.index') }}" class="btn btn-secondary">
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
    CKEDITOR.replace('vision');
    CKEDITOR.replace('mission');
</script>
@endpush