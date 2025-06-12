@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-4">
    <h2>Detail Pesanan</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Judul Pelajaran:</strong> {{ $order->course->title }}</p>
            <p><strong>Email Pemesan:</strong> {{ $order->email }}</p>
            <p><strong>Jadwal:</strong> {{ $order->schedule->format('Y-m-d H:i') }}</p>
            <p><strong>Link Google Meet:</strong> 
                @if($order->meet_link)
                    <a href="{{ $order->meet_link }}" target="_blank">{{ $order->meet_link }}</a>
                @else
                    <span class="text-muted">Belum disetel</span>
                @endif
            </p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select">
                        @foreach(['pending','accepted','completed','cancelled'] as $status)
                            <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="meet_link" class="form-label">Link Google Meet</label>
                    <input type="url" id="meet_link" name="meet_link" class="form-control" value="{{ old('meet_link', $order->meet_link) }}" placeholder="https://meet.google.com/...">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
