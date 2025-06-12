@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Kontak Kami</h1>
    <p class="text-center">Silakan hubungi kami via:</p>
    @if(!empty($appSettings->contact_email))
        <p class="text-center"><i class="bi bi-envelope-fill"></i> <a href="mailto:{{ $appSettings->contact_email }}">{{ $appSettings->contact_email }}</a></p>
    @endif
    @if(!empty($appSettings->contact_phone))
        <p class="text-center"><i class="bi bi-telephone-fill"></i> {{ $appSettings->contact_phone }}</p>
    @endif
    @if(!empty($appSettings->address))
        <p class="text-center mt-2"><i class="bi bi-geo-alt-fill"></i> {{ $appSettings->address }}</p>
    @endif
    <div class="text-center mt-4">
        <p>Kunjungi halaman lain:</p>
        <a href="{{ route('home') }}" class="btn btn-link">Beranda</a>
        <a href="{{ route('catalog.index') }}" class="btn btn-link">Daftar Paket</a>
    </div>
</div>
@endsection