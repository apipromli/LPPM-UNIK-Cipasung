@extends('admin.layouts.app')

@section('title', 'Pimpinan')

@section('content')
<div class="page-header">
    <h1>Pimpinan LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pimpinan</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Pimpinan</h5>
        <a href="{{ route('admin.leaders.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Pimpinan
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Urutan</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaders as $leader)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($leader->photo)
                            <img src="{{ asset('storage/' . $leader->photo) }}"
                                alt="{{ $leader->name }}"
                                style="width: 50px; height: 50px; object-fit: cover;"
                                class="rounded-circle">
                            @else
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px; background: #e9ecef;">
                                <i class="bi bi-person"></i>
                            </div>
                            @endif
                        </td>
                        <td>{{ $leader->name }}</td>
                        <td>{{ $leader->position }}</td>
                        <td>{{ $leader->email ?? '-' }}</td>
                        <td>{{ $leader->phone ?? '-' }}</td>
                        <td><span class="badge bg-primary">{{ $leader->order }}</span></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.leaders.show', $leader) }}"
                                    class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.leaders.edit', $leader) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.leaders.destroy', $leader) }}"
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