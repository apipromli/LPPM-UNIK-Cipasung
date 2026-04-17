@extends('admin.layouts.app')

@section('title', 'Pusat Studi')

@section('content')
<div class="page-header">
    <h1>Pusat Studi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pusat Studi</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Pusat Studi</h5>
        <a href="{{ route('admin.study-centers.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Pusat Studi
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Singkatan</th>
                        <th>Ketua</th>
                        <th>Status</th>
                        <th>Urutan</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studyCenters as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->name }}"
                                style="height: 50px; width: 80px; object-fit: cover;"
                                class="rounded">
                            @else
                            <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($item->name, 50) }}</td>
                        <td>{{ $item->short_name ?? '-' }}</td>
                        <td>{{ $item->head_name ?? '-' }}</td>
                        <td>
                            <span class="badge bg-{{ $item->is_active ? 'success' : 'secondary' }}">
                                {{ $item->is_active ? 'Aktif' : 'Non-aktif' }}
                            </span>
                        </td>
                        <td>{{ $item->order }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.study-centers.show', $item) }}"
                                    class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.study-centers.edit', $item) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.study-centers.destroy', $item) }}"
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
        <div class="mt-3">
            {{ $studyCenters->links() }}
        </div>
    </div>
</div>
@endsection
