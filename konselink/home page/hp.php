<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Talk Zone</title>
  <link rel="stylesheet" href="hp.css">
</head>
<body>
  <button id="toTop">↑</button>
  <script>
  const toTop = document.getElementById("toTop");

  window.addEventListener("scroll", () => {
    toTop.style.display = window.scrollY > 300 ? "block" : "none";
  });

  toTop.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
</script>


  <header>
    <div class="logo">
      <img src="Screenshot_2025-09-06_143612-removebg-preview.png" alt="Talk Zone Logo" width="50">
      <span>Talk Zone</span>
    </div>
    <nav>
      <a href="../home page/hp.php">Home</a>
      <a href="../fitur/fitur.php">Fitur</a>
      <a href="../artikel/art.php">Artikel</a>
      <a href="../contact us/contact.php">Contact us</a>
    </nav>
    <a href="../form login/login.php" class="btn-login">Login/Register</a>
  </header>

  <div style="height: 40px; background: white;"></div>

  <section class="hero">
    <div class="hero-text">
      <h1>Curhat Tanpa Takut,<br>Konseling Tanpa Ribet</h1>
      <p>Temukan ruang aman untuk berbagi dan bertumbuh bersama</p>
      <div class="hero-buttons">
        <a href="#" class="btn-primary">Mulai Curhat</a>
        <a href="#" class="btn-secondary">Lihat Jadwal Konseling</a>
      </div>
    </div>
    <div class="hero-image">
      <img src="gambar burung flamin.png" alt="Maskot Konseling">
    </div>
  </section>

  <div style="height: 100px; background: white;"></div>

  <section class="tentang">
    <h2>TENTANG KAMI</h2>
    <p>
      Di balik layar platform ini, kami adalah sekelompok anak muda yang percaya bahwa setiap orang berhak
      didengar, dimengerti, dan didampingi. Kami hadir untuk menciptakan ruang konseling yang ramah, mudah diakses,
      dan bebas stigma, tempat di mana kamu bisa curhat tanpa takut, bertumbuh tanpa tekanan.
    </p>
    <p>
      Kami menggabungkan teknologi dengan empati, menghadirkan layanan konseling online yang intuitif, aman, dan
      penuh makna. Dengan pendekatan yang berpusat pada pengguna, kami ingin menjembatani kebutuhan emosional dan
      spiritual generasi masa kini.
    </p>
    <p>
      Visi kami adalah membangun ekosistem kesehatan mental yang inklusif dan berkelanjutan, khususnya bagi komunitas
      muda dan keluarga di Indonesia.
    </p>
  </section>

  <div style="height: 100px; background: white;"></div>

  <section class="misi">
    <h2>MISI KAMI</h2>
    <ul>
      <li>Menyediakan layanan konseling yang mudah, cepat, dan terpercaya</li>
      <li>Membangun komunitas yang saling mendukung dan memberdayakan</li>
      <li>Menghadirkan konten edukatif dan inspiratif yang menyentuh hati</li>
      <li>Menjaga privasi dan keamanan setiap pengguna dengan sepenuh hati</li>
    </ul>
    <p class="note">
      Kami bukan sekadar platform. Kami adalah teman seperjalananmu dalam proses penyembuhan dan pertumbuhan.
    </p>
  </section>

  <section class="testimoni">
    <h2>TESTIMONI</h2>
    <div class="testimoni-grid">
      <div class="card">
        <p>"Awalnya aku ragu buat curhat ke konselor online. Tapi setelah sesi pertama, aku merasa lebih ringan dan dimengerti. Rasanya seperti ngobrol sama teman yang nggak menghakimi."</p>
        <div class="username">USERNAME</div>
      </div>
      <div class="card">
        <p>"Awalnya aku ragu buat curhat ke konselor online. Tapi setelah sesi pertama, aku merasa lebih ringan dan dimengerti. Rasanya seperti ngobrol sama teman yang nggak menghakimi."</p>
        <div class="username">USERNAME</div>
      </div>
      <div class="card">
        <p>"Awalnya aku ragu buat curhat ke konselor online. Tapi setelah sesi pertama, aku merasa lebih ringan dan dimengerti. Rasanya seperti ngobrol sama teman yang nggak menghakimi."</p>
        <div class="username">USERNAME</div>
      </div>
      <div class="card">
        <p>"Awalnya aku ragu buat curhat ke konselor online. Tapi setelah sesi pertama, aku merasa lebih ringan dan dimengerti. Rasanya seperti ngobrol sama teman yang nggak menghakimi."</p>
        <div class="username">USERNAME</div>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Talk Zone. Semua Hak Dilindungi.</p>
  </footer>

</body>
</html>
