@extends('frontend.layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Struktur Organisasi LPPM</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Tentang Kami</li>
                <li class="breadcrumb-item active">Struktur Organisasi</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($structure)
        <div class="text-center mb-4">
            <h2>{{ $structure->title }}</h2>
            @if($structure->description)
            <p class="text-muted">{{ $structure->description }}</p>
            @endif
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <img src="{{ asset('storage/' . $structure->image) }}"
                    alt="{{ $structure->title }}"
                    class="img-fluid w-100 rounded">
            </div>
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Informasi struktur organisasi belum tersedia.
        </div>
        @endif
    </div>
</section>
@endsection