@extends('admin.layouts.app')

@section('title', 'Edit Pimpinan')

@section('content')
<div class="page-header">
    <h1>Edit Pimpinan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.leaders.index') }}">Pimpinan</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit Pimpinan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.leaders.update', $leader) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" name="name" value="{{ old('name', $leader->name) }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror"
                            id="position" name="position" value="{{ old('position', $leader->position) }}" required>
                        @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email', $leader->email) }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                            id="phone" name="phone" value="{{ old('phone', $leader->phone) }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="order" class="form-label">Urutan Tampilan</label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror"
                            id="order" name="order" value="{{ old('order', $leader->order) }}" min="0">
                        <small class="text-muted">Semakin kecil angka, semakin atas posisinya</small>
                        @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        @if($leader->photo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $leader->photo) }}"
                                alt="{{ $leader->name }}"
                                class="img-thumbnail rounded-circle"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                        @endif
                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                            id="photo" name="photo" accept="image/*">
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                        @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="biography" class="form-label">Biografi</label>
                        <textarea class="form-control @error('biography') is-invalid @enderror"
                            id="biography" name="biography" rows="5">{{ old('biography', $leader->biography) }}</textarea>
                        @error('biography')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.leaders.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection