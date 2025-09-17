@extends('layout')

@section('title', 'Tentang Saya')

@section('content')
<div class="container-fluid my-1">
  <div class="card border-1 shadow-lg rounded-5 overflow-hidden p-4 mx-auto custom-container">
    <h2 class="fw-bold text-gradient mb-4 text-center">Tentang Saya</h2>
    <div class="row g-4 align-items-center">
      
      <!-- Foto Profil (Kiri) -->
      <div class="col-md-3 text-center">
        <img src="{{ asset('images/foto-profil.jpg') }}" 
             class="img-fluid rounded-circle shadow-lg border border-2 border-warning" 
             alt="Foto Profil">
      </div>

      <!-- Biodata (Tengah) -->
        <div class="col-md-4">
        <ul class="list-unstyled fs-5 mb-4 biodata-list">
            <li class="mb-2 d-flex">
            <span class="icon-label"><i class="bi bi-person-fill text-success"></i> <strong>Nama</strong></span>
            <span>: Ardiansyah</span>
            </li>
            <li class="mb-2 d-flex">
            <span class="icon-label"><i class="bi bi-card-text text-primary"></i> <strong>NIM</strong></span>
            <span>: 6304250091</span>
            </li>
            <li class="mb-2 d-flex">
            <span class="icon-label"><i class="bi bi-mortarboard-fill text-warning"></i> <strong>Prodi</strong></span>
            <span>: Rekayasa Perangkat Lunak</span>
            </li>
            <li class="mb-2 d-flex">
            <span class="icon-label"><i class="bi bi-building text-danger"></i> <strong>Universitas</strong></span>
            <span>: Politeknik Negeri Bengkalis</span>
            </li>
        </ul>

        <h4 class="fw-bold text-dark mb-3">Media Sosial</h4>
        <div class="d-flex flex-wrap gap-2">
            <a href="#" class="btn btn-outline-primary btn-sm px-3"><i class="bi bi-facebook"></i> Facebook</a>
            <a href="#" class="btn btn-outline-info btn-sm px-3"><i class="bi bi-twitter"></i> Twitter</a>
            <a href="#" class="btn btn-outline-danger btn-sm px-3"><i class="bi bi-instagram"></i> Instagram</a>
        </div>
        </div>

      <!-- Video (Kanan) -->
      <div class="col-md-5 text-center">
        <div class="video-box border border-3 border-danger rounded-4 shadow-sm mx-auto d-flex flex-column justify-content-center align-items-center">
          <button class="btn btn-danger rounded-circle p-5 shadow-lg play-btn">
            <i class="bi bi-play-fill fs-1"></i>
          </button>
          <p class="mt-3 fw-semibold fs-4">Video Produk</p>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Extra CSS -->
<style>
  .custom-container {
    max-width: 1400px; /* atur lebar card maksimal */
  }

  .video-box {
    width: 420px;
    height: 280px;
    background: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .video-box:hover {
    transform: scale(1.02);
    box-shadow: 0 0 25px rgba(220, 53, 69, 0.5);
  }

  /* CSS biodata : */
  .biodata-list .icon-label {
  width: 180px; 
  flex-shrink: 0;
}

</style>
@endsection
