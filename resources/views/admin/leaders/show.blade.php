@extends('admin.layouts.app')

@section('title', 'Detail Pimpinan')

@section('content')
<div class="page-header">
    <h1>Detail Pimpinan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.leaders.index') }}">Pimpinan</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $leader->name }}</h5>
        <div>
            <a href="{{ route('admin.leaders.edit', $leader) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.leaders.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                @if($leader->photo)
                <img src="{{ asset('storage/' . $leader->photo) }}"
                    alt="{{ $leader->name }}"
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
                    <p>{{ $leader->name }}</p>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Jabatan:</label>
                    <p>{{ $leader->position }}</p>
                </div>

                @if($leader->email)
                <div class="mb-3">
                    <label class="fw-bold">Email:</label>
                    <p>{{ $leader->email }}</p>
                </div>
                @endif
                @if($leader->phone)
                <div class="mb-3">
                    <label class="fw-bold">Telepon:</label>
                    <p>{{ $leader->phone }}</p>
                </div>
                @endif

                <div class="mb-3">
                    <label class="fw-bold">Urutan Tampilan:</label>
                    <p><span class="badge bg-primary">{{ $leader->order }}</span></p>
                </div>

                @if($leader->biography)
                <div class="mb-3">
                    <label class="fw-bold">Biografi:</label>
                    <p>{{ $leader->biography }}</p>
                </div>
                @endif

                <div class="mb-3">
                    <label class="fw-bold">Tanggal Dibuat:</label>
                    <p>{{ $leader->created_at->format('d F Y H:i') }}</p>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Terakhir Diupdate:</label>
                    <p>{{ $leader->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection