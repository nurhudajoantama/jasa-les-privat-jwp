@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Cek Pesanan</h2>

    <!-- Form to input email -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="" method="GET" class="d-flex gap-2">
                <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" value="{{ $data['email'] ?? '' }}" required>
                <button type="submit" class="btn btn-primary">Lihat Pesanan</button>
            </form>
        </div>
    </div>

    <!-- Display orders if any -->
    @isset($orders)
        <div class="mt-5">
            @if($orders->isEmpty())
                <p class="text-center">Belum ada pesanan untuk email {{ $data['email'] }}.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul Pelajaran</th>
                                <th>Jadwal</th>
                                <th>Status</th>
                                <th>Link Meet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $i => $order)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $order->course->title }}</td>
                                    <td>{{ $order->schedule->format('Y-m-d H:i') }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>
                                        @if($order->meet_link)
                                            <a href="{{ $order->meet_link }}" target="_blank">
                                                {{ $order->meet_link }}
                                            </a>
                                        @else
                                            <span class="text-muted">Belum tersedia</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    @endisset
</div>
@endsection
