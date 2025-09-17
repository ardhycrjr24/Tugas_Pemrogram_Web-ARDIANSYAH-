<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // contoh dummy data, nanti bisa diganti ambil dari database
        $products = [
            ['id'=>1,'nama'=>'Durian Lokal','harga'=>70000,'deskripsi'=>'Durian segar dengan aroma khas dan rasa manis legit.','rating'=>4.9,'gambar'=>asset('produk/1durian.jpg')],
            ['id'=>2,'nama'=>'Manggis','harga'=>25000,'deskripsi'=>'Buah manggis manis dengan kulit ungu pekat.','rating'=>4.7,'gambar'=>asset('produk/2manggis.jpg')],
            ['id'=>3,'nama'=>'Pisang Raja','harga'=>20000,'deskripsi'=>'Pisang kuning matang dengan tekstur lembut dan manis.','rating'=>4.6,'gambar'=>asset('produk/3pisang.jpg')],
            ['id'=>4,'nama'=>'Jambu Air','harga'=>20000,'deskripsi'=>'Jambu air merah segar dengan rasa manis dan renyah.','rating'=>4.5,'gambar'=>asset('produk/4jambuair.jpg')],
            ['id'=>5,'nama'=>'Buah Naga','harga'=>30000,'deskripsi'=>'Buah naga merah kaya serat, cocok untuk jus segar.','rating'=>4.8,'gambar'=>asset('produk/5buahnaga.jpg')],
            ['id'=>6,'nama'=>'Semangka Segar','harga'=>15000,'deskripsi'=>'Semangka merah segar dengan kadar air tinggi.','rating'=>4.7,'gambar'=>asset('produk/6semangka.jpg')],
            ['id'=>7,'nama'=>'Sirsak','harga'=>30000,'deskripsi'=>'Sirsak segar dengan rasa asam manis yang khas.','rating'=>4.6,'gambar'=>asset('produk/77sir.jpeg')],
            ['id'=>8,'nama'=>'Jeruk Manis','harga'=>30000,'deskripsi'=>'Jeruk manis segar kaya vitamin C.','rating'=>4.8,'gambar'=>asset('produk/8jeruk.jpeg')],
        ];

        // ProductController.php
        return view('product', compact('products'));

    }
}
