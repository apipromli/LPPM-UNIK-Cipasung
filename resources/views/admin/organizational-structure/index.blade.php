@extends('admin.layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')
<div class="page-header">
    <h1>Struktur Organisasi LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Struktur Organisasi</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Struktur Organisasi</h5>
        <a href="{{ route('admin.organizational-structures.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Struktur Organisasi
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
                    @foreach($structures as $structure)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $structure->title }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $structure->image) }}"
                                alt="{{ $structure->title }}"
                                style="height: 50px; width: 80px; object-fit: cover;"
                                class="rounded">
                        </td>
                        <td>{{ $structure->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.organizational-structures.show', $structure) }}"
                                    class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.organizational-structures.edit', $structure) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.organizational-structures.destroy', $structure) }}"
                                    method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
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