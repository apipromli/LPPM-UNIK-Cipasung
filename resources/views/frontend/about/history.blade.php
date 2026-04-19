@extends('frontend.layouts.app')

@section('title', 'Sejarah/Profil')

@section('content')
<div class="page-header page-header-image">
    <div class="page-header-overlay"></div>

    <div class="container">
        <h1>Sejarah / Profil LPPM</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">Tentang Kami</li>
                <li class="breadcrumb-item active">Sejarah / Profil</li>
            </ol>
        </nav>
    </div>
</div>


<section class="py-5">
    <div class="container">
        @if($profile)
        <div class="row">
            @if($profile->image)
            <div class="col-md-4 mb-4">
                <div class="profile-image-wrap">
                    <img src="{{ asset('storage/' . $profile->image) }}"
                        alt="{{ $profile->title }}"
                        class="profile-img"
                        onerror="this.parentElement.innerHTML='<div class=\'profile-placeholder\'><i class=\'bi bi-building\'></i><span>LPPM UNIK Cipasung</span></div>'">
                </div>
            </div>
            @endif

            <div class="col-md-{{ $profile->image ? '8' : '12' }}">
                <h2 class="mb-4">{{ $profile->title }}</h2>
                <div class="content-text">
                    {!! $profile->content !!}
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Informasi profil belum tersedia.
        </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
    .content-text {
        font-size: 16px;
        line-height: 1.8;
        text-align: justify;
    }

    .content-text p {
        margin-bottom: 20px;
    }

    .content-text h3,
    .content-text h4 {
        margin-top: 30px;
        margin-bottom: 15px;
        color: var(--primary);
    }

    .profile-image-wrap {
        position: sticky;
        top: 90px;
    }
    .profile-img {
        width: 100%;
        height: 320px;
        object-fit: cover;
        object-position: top;
        border-radius: 14px;
        box-shadow: 0 8px 30px rgba(14,66,38,.15);
    }
    .profile-placeholder {
        width: 100%;
        height: 320px;
        background: linear-gradient(135deg, #0e4226, #1a6638);
        border-radius: 14px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1rem;
        gap: 12px;
        box-shadow: 0 8px 30px rgba(14,66,38,.15);
    }
    .profile-placeholder i { font-size: 3rem; opacity: .8; }

    .page-header-image {
        position: relative;
        min-height: 260px;
        display: flex;
        align-items: center;
        color: #fff;
        overflow: hidden;

        background-image: url('/assets/images/banner.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    /* Overlay blur & darken */
    .page-header-overlay {
        position: absolute;
        inset: 0;
        background: rgba(40, 39, 39, 0.45);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
    }

    /* Content layer */
    .page-header-image .container {
        position: relative;
        z-index: 2;
    }

    .page-header-image h1 {
        font-weight: 700;
        margin-bottom: 0.75rem;
    }

    /* Breadcrumb */
    .page-header-image .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 0;
    }

    .page-header-image .breadcrumb-item a {
        color: #f1f1f1;
        text-decoration: none;
    }

    .page-header-image .breadcrumb-item.active {
        color: #e0e0e0;
    }
</style>
@endpush