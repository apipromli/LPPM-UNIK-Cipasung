@extends('admin.layouts.app')

@section('title', 'Edit Staf')

@section('content')
<div class="page-header">
    <h1>Edit Staf</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.staff.index') }}">Staf</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit Staf</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.staff.update', $staff) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" name="name" value="{{ old('name', $staff->name) }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror"
                            id="position" name="position" value="{{ old('position', $staff->position) }}" required>
                        @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email', $staff->email) }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                            id="phone" name="phone" value="{{ old('phone', $staff->phone) }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="order" class="form-label">Urutan Tampilan</label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror"
                            id="order" name="order" value="{{ old('order', $staff->order) }}" min="0">
                        <small class="text-muted">Semakin kecil angka, semakin atas posisinya</small>
                        @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        @if($staff->photo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $staff->photo) }}"
                                alt="{{ $staff->name }}"
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
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection