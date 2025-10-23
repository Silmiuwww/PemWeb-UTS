function salam() {
  console.log("Selamat datang di Gunung Argopuro — Jelajahi jalur pendakian terpanjang di Jawa!");
}

// Validasi form (kalau nanti ada form)
function validasiForm() {
  const nama = document.getElementById("nama")?.value || "";
  const email = document.getElementById("email")?.value || "";
  const pesan = document.getElementById("pesan")?.value || document.getElementById("subjek")?.value || "";

  document.querySelectorAll(".notif").forEach(e => e.remove());

  if (!nama.trim() || !email.trim() || !pesan.trim()) {
    document.querySelector("form").insertAdjacentHTML(
      "beforeend",
      "<p class='notif' style='color:#f55; font-weight:600;'>Harap isi semua kolom dengan benar.</p>"
    );
    return false;
  }

  document.querySelector("form").insertAdjacentHTML(
    "beforeend",
    "<p class='notif' style='color:#4CAF50; font-weight:600;'>Pesan berhasil dikirim. Terima kasih, " + nama + "!</p>"
  );
  return false;
}
  document.addEventListener("DOMContentLoaded", () => {
  setTimeout(() => {
    const elements = document.querySelectorAll(".content, .card, .dest, .blog-card, .about-container");
    elements.forEach(el => el.classList.add("fade-in"));
  }, 200); // jeda 0.2 detik biar animasi kelihatan
});



