@extends('admin.layouts.app')

@section('title', 'Tambah PPM')

@section('content')
<div class="page-header">
    <h1>Tambah Data PPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.ppm.index') }}">Data PPM</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Tambah PPM</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.ppm.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Setelah field title -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nidn" class="form-label">NIDN/NIM</label>
                    <input type="text" class="form-control @error('nidn') is-invalid @enderror"
                        id="nidn" name="nidn" value="{{ old('nidn') }}">
                    @error('nidn')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="scheme" class="form-label">Skema <span class="text-danger">*</span></label>
                    <select class="form-select @error('scheme') is-invalid @enderror"
                        id="scheme" name="scheme" required>
                        <option value="">Pilih Skema</option>
                        <option value="Ibp" {{ old('scheme') == 'Ibp' ? 'selected' : '' }}>Ibp</option>
                        <option value="ITGbM" {{ old('scheme') == 'ITGbM' ? 'selected' : '' }}>ITGbM</option>
                        <option value="Lainnya" {{ old('scheme') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('scheme')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('admin.ppm.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection