@extends('layout')

@section('title', 'Home')

@section('content')

<!-- Carousel -->
<div class="container mb-2">
    <div id="heroCarousel" class="carousel slide shadow-lg rounded-4 overflow-hidden" 
         data-bs-ride="carousel" data-bs-interval="3500" style="max-width: 900px; margin: auto;">
        
        <!-- Indikator -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
        </div>

        <!-- Isi Carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/slide1.png') }}" class="d-block w-100" alt="Slide 1" style="height: 380px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slide2.webp') }}" class="d-block w-100" alt="Slide 2" style="height: 380px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slide3.jpg') }}" class="d-block w-100" alt="Slide 3" style="height: 380px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slide4.jpg') }}" class="d-block w-100" alt="Slide 4" style="height: 380px; object-fit: cover;">
            </div>
        </div>

        <!-- Tombol Navigasi -->
        <button class="carousel-control-prev custom-control" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next custom-control" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<!-- Hero Banner -->
<div class="p-5 mb-4 text-center bg-light rounded-3 shadow-sm">
    <h1 class="display-4 fw-bold text-success">Selamat Datang di T O B U </h1>
    <p class="lead">Belanja buah segar langsung dari kebun dengan kualitas premium 🍊🍇🍎</p>
    <a href="{{ url('/product') }}" class="btn btn-success btn-lg">Belanja Sekarang</a>
</div>

<!-- Fitur Utama -->
<div class="row text-center">
    <div class="col-md-4">
        <img src="https://img.icons8.com/color/96/apple.png" alt="Fresh" />
        <h5 class="mt-2">Buah Segar</h5>
        <p>Dipetik langsung dari kebun setiap hari.</p>
    </div>
    <div class="col-md-4">
        <img src="https://img.icons8.com/color/96/delivery.png" alt="Delivery" />
        <h5 class="mt-2">Pengiriman Cepat</h5>
        <p>Pesanan sampai di rumah dengan aman.</p>
    </div>
    <div class="col-md-4">
        <img src="https://img.icons8.com/color/96/discount.png" alt="Promo" />
        <h5 class="mt-2">Promo Menarik</h5>
        <p>Diskon spesial untuk pelanggan setia.</p>
    </div>
</div>

<!-- Custom CSS -->
<style>
    /* Tombol navigasi carousel lebih besar & putih bersih */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 3rem;
        height: 3rem;
        background-size: 100% 100%;
        filter: invert(1); /* bikin ikon jadi putih */
    }

    .custom-control {
        width: 6%;
        border: none;
    }
</style>
@endsection
