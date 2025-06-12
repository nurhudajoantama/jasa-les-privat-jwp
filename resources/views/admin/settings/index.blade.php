@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-4">
    <h2>Pengaturan Aplikasi</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="site_name" class="form-label">Nama Situs</label>
            <input type="text" class="form-control" id="site_name" name="site_name" value="{{ old('site_name', $setting->site_name) }}">
        </div>
        <div class="mb-3">
            <label for="site_description" class="form-label">Deskripsi Situs</label>
            <textarea class="form-control" id="site_description" name="site_description" rows="3">{{ old('site_description', $setting->site_description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="contact_email" class="form-label">Surel Kontak</label>
            <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ old('contact_email', $setting->contact_email) }}">
        </div>
        <div class="mb-3">
            <label for="contact_phone" class="form-label">Telepon Kontak</label>
            <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $setting->contact_phone) }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" id="address" name="address" rows="2">{{ old('address', $setting->address) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
    </form>
</div>
@endsection
