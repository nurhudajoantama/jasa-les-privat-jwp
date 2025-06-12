@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            @if($course->image)
                <img src="{{ asset('storage/' . $course->image) }}" class="img-fluid" alt="{{ $course->title }}">
            @else
                <img src="https://via.placeholder.com/500" class="img-fluid" alt="{{ $course->title }}">
            @endif
        </div>
        <div class="col-md-6">
            <h1>{{ $course->title }}</h1>
            <p>{{ $course->description }}</p>
            <h4 class="fw-bold">Rp{{ number_format($course->price, 0, ',', '.') }}</h4>

            <hr>

            <h5>Pesan Les Privat</h5>
            <form action="{{ route('catalog.order', $course) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <div class="mb-3">
                    <label for="schedule" class="form-label">Jadwal (tanggal & waktu)</label>
                    <input type="datetime-local" id="schedule" name="schedule" class="form-control" value="{{ old('schedule') }}" required>
                    @error('schedule')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
            </form>
        </div>
    </div>
</div>
@endsection
