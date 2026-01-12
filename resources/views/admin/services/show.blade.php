@extends('admin.layouts.app')

@section('title', 'Detail Layanan')

@section('content')
<div class="page-header">
    <h1>Detail Layanan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Layanan</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $service->title }}</h5>
        <div>
            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Jenis Layanan:</label>
                    <p><span class="badge bg-primary">{{ ucfirst($service->type) }}</span></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Urutan:</label>
                    <p><span class="badge bg-secondary">{{ $service->order }}</span></p>
                </div>
            </div>

            @if($service->icon)
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Icon:</label>
                    <p><i class="bi bi-{{ $service->icon }}" style="font-size: 32px;"></i> {{ $service->icon }}</p>
                </div>
            </div>
            @endif

            @if($service->link)
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Link:</label>
                    <p><a href="{{ $service->link }}" target="_blank">{{ $service->link }}</a></p>
                </div>
            </div>
            @endif

            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Deskripsi:</label>
                    <div class="border rounded p-3 bg-light">
                        {!! $service->description !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Dibuat:</label>
                    <p>{{ $service->created_at->format('d F Y H:i') }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Terakhir Diupdate:</label>
                    <p>{{ $service->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection