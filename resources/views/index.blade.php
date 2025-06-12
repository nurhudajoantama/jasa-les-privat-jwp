@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<header class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-5">Selamat Datang di PrivatOnline</h1>
        <p class="lead">Platform Pemesanan Les Privat via Google Meet</p>
        <a href="{{ route('catalog.index') }}" class="btn btn-light btn-lg mt-3">Lihat Semua Paket</a>
    </div>
</header>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Mengapa Memilih PrivatOnline?</h2>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <i class="bi bi-people-fill display-4 text-primary"></i>
                <h5 class="mt-3">Pengajar Profesional</h5>
                <p>Kami bekerja sama dengan pengajar berpengalaman dan bersertifikat yang siap membantu Anda mencapai tujuan belajar.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="bi bi-clock-fill display-4 text-primary"></i>
                <h5 class="mt-3">Jadwal Fleksibel</h5>
                <p>Pilih waktu belajar yang sesuai dengan kesibukan Anda. Kami menyediakan sesi yang dapat disesuaikan kapan pun Anda butuh.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="bi bi-globe2 display-4 text-primary"></i>
                <h5 class="mt-3">Belajar Online</h5>
                <p>Kelas privat dilakukan via Google Meet, sehingga dapat diakses dari mana saja tanpa batasan lokasi.</p>
            </div>
        </div>
    </div>
</section>

<!-- Catalog Section -->
<section id="catalog" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Paket Les Privat</h2>
        <div class="row g-4">
            @forelse($catalogs as $course)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        @if($course->image)
                            <img src="{{ asset('storage/'.$course->image) }}" class="card-img-top" alt="{{ $course->title }}">
                        @else
                            <img src="https://via.placeholder.com/400" class="card-img-top" alt="{{ $course->title }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($course->description, 80) }}</p>
                            <div class="mb-2 fw-bold">Rp{{ number_format($course->price, 0, ',', '.') }}</div>
                            <a href="{{ route('catalog.show', $course) }}" class="btn btn-primary mt-auto">Detail & Pesan</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="fs-5">Belum ada paket yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection