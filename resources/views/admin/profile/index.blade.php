@extends('admin.layouts.app')

@section('title', 'Profil/Sejarah')

@section('content')
<div class="page-header">
    <h1>Profil/Sejarah LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Profil/Sejarah</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Profil/Sejarah</h5>
        <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Profil
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Tanggal Dibuat</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $profile->title }}</td>
                        <td>
                            @if($profile->image)
                            <img src="{{ asset('storage/' . $profile->image) }}" alt="{{ $profile->title }}" style="height: 50px; width: 80px; object-fit: cover;" class="rounded">
                            @else
                            <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>{{ $profile->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.profiles.show', $profile) }}" class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.profiles.edit', $profile) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.profiles.destroy', $profile) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection