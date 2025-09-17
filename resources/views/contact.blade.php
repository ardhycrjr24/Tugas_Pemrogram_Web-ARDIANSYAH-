@extends('layout')

@section('title', 'Kontak')

@section('content')
<div class="container py-5">
  <div class="row g-4">
    
    <!-- Kolom Kiri: Form Kontak -->
    <div class="col-lg-6">
      <div class="card shadow-lg border-0 rounded-4 h-100">
        <div class="card-body p-5">
          <h2 class="fw-bold text-center mb-4 text-gradient">Hubungi Kami</h2>
          <p class="text-muted text-center mb-4">
            Ada pertanyaan? Silakan pilih cara kontak dan tuliskan pesan Anda.
          </p>

          <form id="contactForm">
            <!-- Jenis Kontak -->
            <div class="mb-3">
              <label for="contactType" class="form-label fw-semibold">Pilih Jenis Kontak</label>
              <select id="contactType" class="form-select rounded-3 shadow-sm">
                <option value="">-- Pilih --</option>
                <option value="email">📧 Email</option>
                <option value="whatsapp">💬 WhatsApp</option>
              </select>
            </div>

            <!-- Email -->
            <div id="emailField" class="mb-3" style="display: none;">
              <label for="email" class="form-label fw-semibold">Alamat Email</label>
              <div class="input-group">
                <span class="input-group-text bg-light border-0"><i class="bi bi-envelope"></i></span>
                <input type="email" id="email" class="form-control shadow-sm rounded-3" placeholder="contoh@email.com">
              </div>
            </div>

            <!-- WhatsApp -->
            <div id="whatsappField" class="mb-3" style="display: none;">
              <label for="whatsapp" class="form-label fw-semibold">Nomor WhatsApp</label>
              <div class="input-group">
                <span class="input-group-text bg-light border-0"><i class="bi bi-whatsapp"></i></span>
                <input type="text" id="whatsapp" class="form-control shadow-sm rounded-3" placeholder="6281234567890">
              </div>
            </div>

            <!-- Pesan -->
            <div class="mb-3">
              <label for="pesan" class="form-label fw-semibold">Pesan Anda</label>
              <textarea id="pesan" rows="4" class="form-control shadow-sm rounded-3" placeholder="Tulis pesan Anda di sini..."></textarea>
            </div>

            <!-- Tombol -->
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-3 shadow-sm fw-semibold py-2 hover-scale">
                <i class="bi bi-send-fill me-2"></i>Kirim Pesan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Kolom Kanan: Google Maps -->
<div class="col-lg-6">
  <div class="card shadow-lg border-0 rounded-4 h-100">
    <div class="card-body p-3">
      <h4 class="fw-semibold mb-3 text-center text-gradient">Lokasi Kami</h4>
      <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-sm">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d305.13479529595395!2d102.12932061765127!3d1.4641913347992364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1600706bc73b1%3A0x69bcf3d58ca3e326!2sBengkalis%2C%20Pangkalan%20Batang%2C%20Bengkalis%20Sub-District%2C%20Bengkalis%20Regency%2C%20Riau%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1758053719635!5m2!1sen!2sus" 
          style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script>
  const contactType = document.getElementById("contactType");
  const emailField = document.getElementById("emailField");
  const whatsappField = document.getElementById("whatsappField");
  const form = document.getElementById("contactForm");

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

@push('styles')
<style>
  .text-gradient {
    background: linear-gradient(45deg, #20c997, #0d6efd);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
  .hover-scale {
    transition: transform 0.2s ease-in-out;
  }
  .hover-scale:hover {
    transform: scale(1.05);
  }
</style>
@endpush
