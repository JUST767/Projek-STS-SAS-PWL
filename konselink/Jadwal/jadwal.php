<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Konseling | Talk Zone</title>
    <link rel="stylesheet" href="jadwal.css">
</head>
<body>
     <header>
    <div class="logo">
      <img src="Screenshot_2025-09-06_143612-removebg-preview.png" alt="Talk Zone Logo" width="50">
      <span>Talk Zone</span>
    </div>
    <nav>
      <a href="#">Home</a>
      <a href="#">Fitur</a>
      <a href="#">Artikel</a>
      <a href="#">Contact us</a>
    </nav>
    <a href="../form login/login.html" class="btn-login">Login/Register</a>
  </header>

  <div style="height: 40px; background: white;"></div>

 
    <main class="wrapper">
        <h1 class="page-title">Jadwal Konseling</h1>

       
        <section class="block">
            <h2 class="block-title">Pilih Konselor</h2>

            <label class="konselor-card">
                <input type="radio" name="konselor" value="k1">
                <span class="bullet"></span>
                <span class="username">USERNAME</span>
            </label>

            <label class="konselor-card">
                <input type="radio" name="konselor" value="k2">
                <span class="bullet"></span>
                <span class="username">USERNAME</span>
            </label>

            <label class="konselor-card">
                <input type="radio" name="konselor" value="k3">
                <span class="bullet"></span>
                <span class="username">USERNAME</span>
            </label>

            <div class="arrow-v">V</div>
        </section>

        
        <section class="block">
            <h2 class="block-title">Pilih Waktu Konseling</h2>

            <div class="time-box"></div>

            <p class="status-text"><span class="label">Keterangan :</span> Ready</p>
        </section>

       
        <section class="block bottom-block">
            <button class="btn-confirm">Konfirmasi</button>

            <div class="reminder-row">
                <input type="checkbox" id="reminder">
                <label for="reminder">Reminder</label>
            </div>
        </section>
    </main>
</body>
</html>
