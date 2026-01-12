@extends('admin.layouts.app')

@section('title', 'Detail Staf')

@section('content')
<div class="page-header">
    <h1>Detail Staf</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.staff.index') }}">Staf</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $staff->name }}</h5>
        <div>
            <a href="{{ route('admin.staff.edit', $staff) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                @if($staff->photo)
                <img src="{{ asset('storage/' . $staff->photo) }}"
                    alt="{{ $staff->name }}"
                    class="img-thumbnail rounded-circle"
                    style="width: 200px; height: 200px; object-fit: cover;">
                @else
                <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center"
                    style="width: 200px; height: 200px; background: #e9ecef;">
                    <i class="bi bi-person" style="font-size: 80px;"></i>
                </div>
                @endif
            </div>

            <div class="col-md-8">
                <div class="mb-3">
                    <label class="fw-bold">Nama:</label>
                    <p>{{ $staff->name }}</p>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Jabatan:</label>
                    <p>{{ $staff->position }}</p>
                </div>

                @if($staff->email)
                <div class="mb-3">
                    <label class="fw-bold">Email:</label>
                    <p>{{ $staff->email }}</p>
                </div>
                @endif

                @if($staff->phone)
                <div class="mb-3">
                    <label class="fw-bold">Telepon:</label>
                    <p>{{ $staff->phone }}</p>
                </div>
                @endif

                <div class="mb-3">
                    <label class="fw-bold">Urutan Tampilan:</label>
                    <p><span class="badge bg-primary">{{ $staff->order }}</span></p>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Tanggal Dibuat:</label>
                    <p>{{ $staff->created_at->format('d F Y H:i') }}</p>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Terakhir Diupdate:</label>
                    <p>{{ $staff->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection