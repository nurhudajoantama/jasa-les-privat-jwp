@extends('layouts.admin')

@section('content')

<!-- Main Content -->
<div class="container mt-5 pt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manajemen Katalog Pelajaran</h2>
        <a href="{{ route('admin.catalog.create') }}" class="btn btn-success">Tambah Pelajaran</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Pelajaran</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $i => $course)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $course->title }}</td>
                        <td>{{ Str::limit($course->description, 50) }}</td>
                        <td>Rp{{ number_format($course->price, 0, ',', '.') }}</td>
                        <td>{{ $course->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.catalog.edit', $course) }}" class="btn btn-sm btn-primary me-1">Edit</a>
                            <form action="{{ route('admin.catalog.destroy', $course) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Belum ada pelajaran.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection