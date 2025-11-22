<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Talk Zone</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    
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
    <a href="../form login/login.html" class="btn-login">Login/Register</a>
  </header>

  <div style="height: 40px; background: white;"></div>

    <main class="page">

 
       <section class="hero">
    <div class="hero-inner">
        <h1 class="hero-title">ASK ME</h1>

        <div class="hero-banner">
            <div class="hero-text-box">
                <p class="hero-text">
                    Kami siap mendengarkan dan mendampingi Anda.
                </p>
            </div>

            <img src="gambar burung flamin.png" alt="Maskot Talk Zone" class="hero-bird">
        </div>

        <p class="hero-desc">
            Jika kamu memiliki pertanyaan, ingin menjadwalkan sesi konseling, atau sekadar
            ingin tahu lebih banyak tentang layanan kami, jangan ragu untuk menghubungi
            kami. Kami akan merespons secepat mungkin dengan penuh perhatian.
        </p>
    </div>
</section>


        <hr class="separator">

        
        <section class="contact-section">
            <h2 class="section-title">Formulir Kontak</h2>

            <form class="contact-form" action="#" method="post">
                <label for="nama">Nama Asli</label>
                <input type="text" id="nama" name="nama">

                <label for="email">Email</label>
                <input type="email" id="email" name="email">

                <label>Subjek Pesan</label>
                <div class="radio-group">
                    <label><input type="radio" name="subjek" value="konseling"> Konseling</label>
                    <label><input type="radio" name="subjek" value="umum"> Pertanyaan Umum</label>
                    <label><input type="radio" name="subjek" value="lain"> Lainnya :</label>
                </div>

                <input type="text" id="lainnya" name="lainnya" class="input-subjek-lain">

                <label for="pesan">Pesan Anda</label>
                <textarea id="pesan" name="pesan" rows="6"></textarea>

                <button type="submit" class="btn-submit">Submit</button>
            </form>
        </section>

        <hr class="separator">

       
        <section class="info-section">
            <h2 class="section-title">Informasi Kami</h2>

            <p><span class="label">Email :</span> Talkzone@gmail.com</p>
            <p><span class="label">Alamat :</span> Jl. Ahmad Yani No.999</p>
            <p><span class="label">No. Telp :</span> 0895-0673-5617</p>
            <p><span class="label">Jam Operasional :</span> Senin–Jumat, 09.00–17.00 WIB</p>
        </section>

        
        <footer class="footer">
            Terima kasih telah mempercayakan cerita dan pertanyaanmu kepada kami. Setiap
            pesan yang masuk adalah langkah awal menuju pemulihan dan pertumbuhan.
            Kami di sini untukmu.
        </footer>

    </main>
</body>
</html>
