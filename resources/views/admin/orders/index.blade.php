@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-4">
    <h2>Manajemen Pesanan</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul Pelajaran</th>
                    <th>Email</th>
                    <th>Jadwal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $i => $order)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $order->course->title }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->schedule->format('Y-m-d H:i') }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">Details</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center">Belum ada pesanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
