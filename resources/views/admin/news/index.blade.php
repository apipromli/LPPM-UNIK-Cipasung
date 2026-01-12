@extends('admin.layouts.app')

@section('title', 'Berita')

@section('content')
<div class="page-header">
    <h1>Berita</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Berita</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Berita</h5>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Berita
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Views</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->title }}"
                                style="height: 50px; width: 80px; object-fit: cover;"
                                class="rounded">
                            @else
                            <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($item->title, 50) }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td><span class="badge bg-info">{{ $item->views }}</span></td>
                        <td>
                            <span class="badge bg-{{ $item->is_published ? 'success' : 'warning' }}">
                                {{ $item->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>{{ $item->published_at ? $item->published_at->format('d M Y') : '-' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.news.show', $item) }}"
                                    class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.news.edit', $item) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.news.destroy', $item) }}"
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