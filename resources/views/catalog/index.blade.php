@extends('layouts.app')

@section('content')
<section id="catalog" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Daftar Paket Les Privat</h2>
        <div class="row g-4">
            @forelse($catalogs as $course)
                <div class="col-sm-6 col-md-3">
                    <div class="card h-100">
                        @if($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="{{ $course->title }}">
                        @else
                            <img src="https://via.placeholder.com/400" class="card-img-top" alt="{{ $course->title }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text text-truncate">{{ Str::limit($course->description, 100) }}</p>
                            <p class="mt-auto fw-bold">Rp{{ number_format($course->price, 0, ',', '.') }}</p>
                            <a href="{{ route('catalog.show', $course) }}" class="btn btn-primary mt-2">Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada paket yang tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection