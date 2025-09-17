@extends('layout')

@section('title', 'Produk')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center fw-bold">🍊 Katalog Produk</h2>

    <!-- Input Pencarian -->
    <div class="row mb-4">
        <div class="col-12 col-md-6 mx-auto">
            <input type="text" id="searchInput" class="form-control form-control-lg shadow-sm"
                placeholder="🔍 Cari buah segar...">
        </div>
    </div>

    <!-- Daftar Produk -->
    <div class="row" id="produkList">
        @foreach ($products as $product)
            <div class="col-6 col-md-4 col-lg-3 mb-4 produk-item">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $product['gambar'] }}" class="card-img-top" alt="{{ $product['nama'] }}">
                    <div class="card-body d-flex flex-column">
                        
                        <!-- Nama & Harga -->
                        <h5 class="card-title nama-produk fw-bold">{{ $product['nama'] }}</h5>
                        <p class="text-success fw-bold mb-2">
                            Rp {{ number_format($product['harga'], 0, ',', '.') }} / Kg
                        </p>

                        <!-- Deskripsi -->
                        <p class="card-text deskripsi-produk text-muted small flex-grow-1">
                            {{ $product['deskripsi'] }}
                        </p>

                        <!-- Rating Dinamis untuk buah -->
                        <p class="text-warning mb-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="bi {{ $i <= round($product['rating']) ? 'bi-star-fill' : 'bi-star' }}"></i>
                            @endfor
                            <span class="text-dark small">({{ $product['rating'] }})</span>
                        </p>

                        <!-- Tombol -->
                        <button 
                            class="btn btn-primary mt-auto w-100"
                            onclick="addToCart(
                                '{{ $product['nama'] }}',
                                {{ $product['harga'] }},
                                '{{ $product['gambar'] }}'
                            )">
                            🛒 Tambah ke Keranjang
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script>
// Pencarian produk
function cariProduk() {
    const input = document.getElementById("searchInput").value.trim().toLowerCase();
    const items = document.querySelectorAll("#produkList .produk-item");

    items.forEach(item => {
        const nama = item.querySelector(".nama-produk")?.textContent.toLowerCase() || "";
        const desc = item.querySelector(".deskripsi-produk")?.textContent.toLowerCase() || "";

        if (nama.includes(input) || desc.includes(input)) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    });
}

// ✅ Tambah ke keranjang
function addToCart(nama, harga, gambar) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // cek apakah produk sudah ada
    let index = cart.findIndex(item => item.nama === nama);
    if (index > -1) {
        cart[index].qty += 1;
        cart[index].total = cart[index].qty * cart[index].harga;
    } else {
        cart.push({
            nama: nama,
            harga: harga,
            gambar: gambar,
            qty: 1,
            total: harga
        });
    }

    localStorage.setItem("cart", JSON.stringify(cart));

    alert("✅ " + nama + " ditambahkan ke keranjang!");
}

// kondisi jalankan saat halaman siap
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("searchInput").addEventListener("input", cariProduk);
});
</script>
@endsection
