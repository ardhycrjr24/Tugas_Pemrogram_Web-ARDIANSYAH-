<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | T O B U </title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            padding: 1rem 1.5rem;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.8rem;
            background: linear-gradient(90deg, #ff7e5f, #feb47b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-link {
            font-size: 1.1rem;
            padding: 0.7rem 1rem !important;
            color: #fff !important;
            transition: 0.3s;
        }
        .nav-link:hover {
            color: #ffe066 !important;
        }
        .btn-cart {
            font-size: 1rem;
            padding: 0.6rem 1.2rem;
            border-radius: 30px;
            font-weight: 500;
        }

        /* 🎨 Custom Navbar */
        .custom-navbar {
            /* margin: 15px auto; */   /* ❌ dinonaktifkan */
            width: 100%; /* ✅100% penuh kiri-kanan */
            /* border-radius: 15px; */ /* kalau tidak mau rounded */
            background: linear-gradient(90deg, rgba(0,176,155,0.9), rgba(150,201,61,0.9));
            backdrop-filter: blur(8px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }
        .custom-navbar:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        }

        /* Content wrapper */
        main {
            flex: 1;
        }

        /* Footer */
        footer {
            background: linear-gradient(90deg, #00b09b, #96c93d);
            color: #fff;
            padding: 25px 0;
            margin-top: auto;
            box-shadow: 0 -4px 12px rgba(0,0,0,0.1);
        }
        footer p {
            margin: 0;
            font-size: 0.95rem;
        }
        footer .social-icons a {
            color: #fff;
            margin: 0 8px;
            font-size: 1.3rem;
            transition: 0.3s;
        }
        footer .social-icons a:hover {
            color: #ffe066;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top custom-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">T O B U</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('product') ? 'active' : '' }}" href="{{ url('/product') }}">Produk</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Kontak</a></li>
                </ul>

                <!-- Tombol Keranjang -->
                <a href="{{ url('/cart') }}" class="btn btn-light btn-cart position-relative">
                    🛒 Keranjang
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cartCount">0</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container my-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; 2025 <strong>T O B U</strong> | Buah Segar Setiap Hari 🍎</p>
            <div class="social-icons mt-2">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS + Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <script>
        // Hitung jumlah item di keranjang
        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let totalItem = cart.reduce((sum, item) => sum + item.qty, 0);
            document.getElementById("cartCount").innerText = totalItem;
        }
        document.addEventListener("DOMContentLoaded", updateCartCount);
    </script>

    @yield('scripts')
</body>
</html>
