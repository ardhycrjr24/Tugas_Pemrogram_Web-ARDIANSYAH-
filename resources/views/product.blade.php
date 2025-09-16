@extends('layout')

@section('title', 'Produk')

@section('content')
<h2 class="mb-4 text-center fw-bold">🍇 Katalog Buah Segar</h2>

<!-- Grid Produk -->
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    @php
        $produk = [
            ['id'=>1, 'nama' => 'Durian Lokal', 'harga' => 35000, 'img' => 'https://picsum.photos/400/250?fruit=durian'],
            ['id'=>2, 'nama' => 'Jeruk Manis', 'harga' => 25000, 'img' => 'https://picsum.photos/400/250?fruit=orange'],
            ['id'=>3, 'nama' => 'Pisang Raja', 'harga' => 20000, 'img' => 'https://picsum.photos/400/250?fruit=banana'],
            ['id'=>4, 'nama' => 'Anggur Ungu', 'harga' => 45000, 'img' => 'https://picsum.photos/400/250?fruit=grape'],
            ['id'=>5, 'nama' => 'Mangga Harum Manis', 'harga' => 30000, 'img' => 'https://picsum.photos/400/250?fruit=mango'],
            ['id'=>6, 'nama' => 'Semangka Segar', 'harga' => 15000, 'img' => 'https://picsum.photos/400/250?fruit=watermelon'],
        ];
    @endphp

    @foreach ($produk as $item)
    <div class="col">
        <div class="card h-100 shadow-sm product-card border-0">
            <img src="{{ $item['img'] }}" class="card-img-top product-img" alt="{{ $item['nama'] }}">
            <div class="card-body text-center">
                <h5 class="card-title fw-bold">{{ $item['nama'] }}</h5>
                <p class="fw-bold text-success fs-5">Rp{{ number_format($item['harga'], 0, ',', '.') }}/kg</p>

                <!-- Qty Awalnya Hidden -->
                <div class="d-none mt-2" id="qty-box-{{ $item['id'] }}">
                    <button class="btn btn-sm btn-outline-success" onclick="ubahQty({{ $item['id'] }}, -1)">➖</button>
                    <span class="mx-2 fw-bold" id="qty-{{ $item['id'] }}">1</span>
                    <button class="btn btn-sm btn-outline-success" onclick="ubahQty({{ $item['id'] }}, 1)">➕</button>
                </div>

                <button class="btn btn-gradient w-100 mt-3"
                    onclick="toggleBeli({{ $item['id'] }}, '{{ $item['nama'] }}', {{ $item['harga'] }})">
                    🛒 Beli Sekarang
                </button>
            </div>

            <!-- Keranjang -->

        </div>
    </div>
    @endforeach
</div>

<script>
    // Fungsi ubah jumlah
    function ubahQty(id, change) {
        let qtyEl = document.getElementById("qty-" + id);
        let qty = parseInt(qtyEl.innerText);
        qty = Math.max(1, qty + change);
        qtyEl.innerText = qty;
    }

    // Toggle tombol beli → qty muncul / tambah ke keranjang
    function toggleBeli(id, nama, harga) {
        let box = document.getElementById("qty-box-" + id);
        let btn = event.target;

        if (box.classList.contains("d-none")) {
            // Tampilkan box qty
            box.classList.remove("d-none");
            btn.innerText = "✅ Tambah ke Keranjang";
        } else {
            // Panggil fungsi tambah ke keranjang
            tambahKeranjang(id, nama, harga);
            // Reset tampilan
            box.classList.add("d-none");
            btn.innerText = "🛒 Beli Sekarang";
            document.getElementById("qty-" + id).innerText = 1;
        }
    }

    // Tambah ke keranjang (pakai localStorage)
    function tambahKeranjang(id, nama, harga) {
        let qty = parseInt(document.getElementById("qty-" + id).innerText);

        // Ambil keranjang lama
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        // Cek apakah produk sudah ada
        let index = cart.findIndex(item => item.nama === nama);
        if (index >= 0) {
            cart[index].qty += qty;
            cart[index].total = cart[index].qty * harga;
        } else {
            cart.push({ id: id, nama: nama, harga: harga, qty: qty, total: harga * qty });
        }

        // Simpan kembali
        localStorage.setItem("cart", JSON.stringify(cart));

        alert(`✅ ${nama} (${qty} kg) ditambahkan ke keranjang!`);
    }
</script>

<style>
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
    }
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    .product-img {
        height: 200px;
        object-fit: cover;
    }
    .btn-gradient {
        background: linear-gradient(45deg, #28a745, #20c997);
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 25px;
        transition: 0.3s;
    }
    .btn-gradient:hover {
        background: linear-gradient(45deg, #20c997, #28a745);
        transform: scale(1.05);
    }
</style>
@endsection
