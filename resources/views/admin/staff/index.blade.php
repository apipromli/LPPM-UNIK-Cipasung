@extends('admin.layouts.app')

@section('title', 'Staf')

@section('content')
<div class="page-header">
    <h1>Staf LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Staf</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Staf</h5>
        <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Staf
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
                    @foreach($staff as $staf)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($staf->photo)
                            <img src="{{ asset('storage/' . $staf->photo) }}"
                                alt="{{ $staf->name }}"
                                style="width: 50px; height: 50px; object-fit: cover;"
                                class="rounded-circle">
                            @else
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px; background: #e9ecef;">
                                <i class="bi bi-person"></i>
                            </div>
                            @endif
                        </td>
                        <td>{{ $staf->name }}</td>
                        <td>{{ $staf->position }}</td>
                        <td>{{ $staf->email ?? '-' }}</td>
                        <td>{{ $staf->phone ?? '-' }}</td>
                        <td><span class="badge bg-primary">{{ $staf->order }}</span></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.staff.show', $staf) }}"
                                    class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.staff.edit', $staf) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.staff.destroy', $staf) }}"
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