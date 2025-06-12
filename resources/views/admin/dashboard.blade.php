@extends('layouts.admin')

@section('content')
<div class="container mt-5 pt-4">
    <h2>Dashboard Admin</h2>
    <div class="row g-4 mt-3">
        <div class="col-md-6">
            <div class="card text-white bg-primary h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3>{{ $orderCount }}</h3>
                    <p>Jumlah Pesanan</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-light">Lihat Pesanan</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3>{{ $courseCount }}</h3>
                    <p>Jumlah Course</p>
                    <a href="{{ route('admin.catalog.index') }}" class="btn btn-light">Lihat Course</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection