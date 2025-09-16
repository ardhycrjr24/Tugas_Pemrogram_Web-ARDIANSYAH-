@extends('layout')

@section('title', 'Kontak')

@section('content')
<h2 class="mb-4">Hubungi Kami</h2>

<form class="card p-4 shadow-sm">
    <div class="mb-3">
        <label for="contactType" class="form-label">Jenis Kontak</label>
        <select id="contactType" class="form-select">
            <option value="">-- Pilih --</option>
            <option value="email">Email</option>
            <option value="whatsapp">WhatsApp</option>
        </select>
    </div>

    <div id="emailField" class="mb-3" style="display: none;">
        <label for="email" class="form-label">Alamat Email</label>
        <input type="email" id="email" class="form-control" placeholder="contoh@email.com">
    </div>

    <div id="whatsappField" class="mb-3" style="display: none;">
        <label for="whatsapp" class="form-label">Nomor WhatsApp</label>
        <input type="text" id="whatsapp" class="form-control" placeholder="6281234567890">
    </div>

    <div class="mb-3">
        <label for="pesan" class="form-label">Pesan</label>
        <textarea id="pesan" rows="3" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Kirim</button>
</form>
@endsection

@section('scripts')
<script>
  const contactType = document.getElementById("contactType");
  const emailField = document.getElementById("emailField");
  const whatsappField = document.getElementById("whatsappField");
  const form = document.querySelector("form");

  contactType.addEventListener("change", function () {
    emailField.style.display = this.value === "email" ? "block" : "none";
    whatsappField.style.display = this.value === "whatsapp" ? "block" : "none";
  });

  form.addEventListener("submit", function(e) {
    e.preventDefault();
    const type = contactType.value;
    const pesan = document.getElementById("pesan").value.trim();

    if (!type) return alert("Pilih jenis kontak!");
    if (type === "email" && !document.getElementById("email").value.trim()) 
        return alert("Masukkan alamat email!");
    if (type === "whatsapp" && !document.getElementById("whatsapp").value.trim()) 
        return alert("Masukkan nomor WhatsApp!");
    if (!pesan) return alert("Tulis pesan Anda!");

    if (type === "whatsapp") {
      const number = document.getElementById("whatsapp").value.trim();
      window.open(`https://wa.me/${number}?text=${encodeURIComponent(pesan)}`, "_blank");
    } else {
      alert("Pesan berhasil dikirim via Email!");
    }

    form.reset();
    emailField.style.display = whatsappField.style.display = "none";
  });
</script>
@endsection
