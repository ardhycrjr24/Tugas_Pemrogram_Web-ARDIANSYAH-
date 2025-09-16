@extends('layout')

@section('title', 'Keranjang Belanja')

@section('content')
<h2 class="mb-4 text-center fw-bold">🛒 Keranjang Belanja</h2>

<div id="cartContainer" class="list-group"></div>

<!-- Footer Checkout -->
<div class="checkout-bar bg-white shadow-lg p-3 d-flex justify-content-between align-items-center">
    <span class="fw-bold fs-5 text-success" id="grandTotal">Rp0</span>
    <button id="checkoutBtn" class="btn btn-gradient px-4">Checkout</button>
</div>

<script>
    function loadCart() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let cartContainer = document.getElementById("cartContainer");
        let grandTotal = 0;
        cartContainer.innerHTML = "";

        if (cart.length === 0) {
            cartContainer.innerHTML = `<p class="text-center text-muted">Keranjang kosong...</p>`;
            document.getElementById("grandTotal").innerText = "Rp0";
            return;
        }

        cart.forEach((item, index) => {
            grandTotal += item.total;

            cartContainer.innerHTML += `
                <div class="list-group-item border-0 shadow-sm mb-2 rounded d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <h6 class="fw-bold mb-1">${item.nama}</h6>
                        <p class="small text-muted mb-1">Rp${item.harga.toLocaleString("id-ID")} / Kg</p>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-sm btn-outline-success rounded-circle" onclick="ubahQty(${index}, -1)">➖</button>
                            <span class="mx-3 fw-bold">${item.qty}</span>
                            <button class="btn btn-sm btn-outline-success rounded-circle" onclick="ubahQty(${index}, 1)">➕</button>
                        </div>
                    </div>
                    <div class="text-end">
                        <p class="fw-bold text-success mb-1">Rp${item.total.toLocaleString("id-ID")}</p>
                        <button class="btn btn-sm btn-outline-danger rounded-circle" onclick="hapusItem(${index})">🗑️</button>
                    </div>
                </div>
            `;
        });

        document.getElementById("grandTotal").innerText = "Rp" + grandTotal.toLocaleString("id-ID");
    }

    function ubahQty(index, change) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart[index].qty += change;
        if (cart[index].qty < 1) cart[index].qty = 1;
        cart[index].total = cart[index].qty * cart[index].harga;
        localStorage.setItem("cart", JSON.stringify(cart));
        loadCart();
    }

    function hapusItem(index) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify(cart));
        loadCart();
    }

    loadCart();
</script>

<style>
    .btn-gradient {
        background: linear-gradient(45deg, #28a745, #20c997);
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 25px;
        padding: 10px 20px;
        transition: 0.3s;
    }
    .btn-gradient:hover {
        background: linear-gradient(45deg, #20c997, #28a745);
        transform: scale(1.05);
    }
    .checkout-bar {
        position: sticky;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
    }
    .list-group-item {
        transition: all 0.2s ease-in-out;
    }
    .list-group-item:hover {
        transform: scale(1.01);
    }
</style>
@endsection
