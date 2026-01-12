@extends('admin.layouts.app')

@section('title', 'Tambah Penelitian')

@section('content')
<div class="page-header">
    <div class="container-fluid px-4">
        <h1>Tambah Penelitian</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.researches.index') }}">Penelitian</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-4">
    <div class="container-fluid px-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Form Tambah Penelitian</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.researches.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Peneliti *</label>
                            <input type="text" name="researcher"
                                class="form-control @error('researcher') is-invalid @enderror"
                                value="{{ old('researcher') }}" required>
                            @error('researcher')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">NIDN / NIM</label>
                            <input type="text" name="nidn"
                                class="form-control @error('nidn') is-invalid @enderror"
                                value="{{ old('nidn') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Skema Penelitian *</label>
                            <select name="scheme"
                                class="form-select @error('scheme') is-invalid @enderror" required>
                                <option value="">Pilih Skema</option>
                                <option value="Penelitian Dosen Pemula">Penelitian Dosen Pemula</option>
                                <option value="Penelitian Pengembangan">Penelitian Pengembangan</option>
                                <option value="Penelitian Terapan">Penelitian Terapan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tahun *</label>
                            <input type="number" name="year"
                                class="form-control @error('year') is-invalid @enderror"
                                value="{{ old('year', date('Y')) }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Judul Penelitian *</label>
                            <input type="text" name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" required>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.researches.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection