@extends('layout')

@section('title', 'Tentang')

@section('content')
<div class="row align-items-center">
    <div class="col-md-6">
        <h2>Tentang TOBU Fresh Market</h2>
        <p>
            Kami menyediakan buah segar terbaik langsung dari petani lokal.  
            Misi kami adalah menghadirkan buah-buahan berkualitas premium ke meja makan Anda
            dengan harga terjangkau.
        </p>
        <ul>
            <li>🍎 100% Buah Segar</li>
            <li>🚚 Pengiriman Cepat</li>
            <li>💰 Harga Terjangkau</li>
        </ul>
    </div>
    <div class="col-md-6 text-center">
        <img src="https://picsum.photos/500/350?random=fruit" class="img-fluid rounded shadow" alt="Tentang Kami">
    </div>
</div>
@endsection
