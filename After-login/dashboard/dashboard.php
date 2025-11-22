<?php

$jadwal_terdekat = [
    [
        'sesi' => 'Sesi Konseling #1',
        'tanggal' => '25 November 2025',
        'waktu' => '14:00 WIB',
        'konselor' => 'dr. Psikolog Maya Sari',
        'status' => 'Akan Datang',
        'status_class' => 'status-aktif'
    ],
    [
        'sesi' => 'Sesi Konseling #2',
        'tanggal' => '1 Desember 2025',
        'waktu' => '10:00 WIB',
        'konselor' => 'dr. Psikolog Budi Santoso',
        'status' => 'Belum Dijadwalkan',
        'status_class' => 'status-belum'
    ]
];

$tes_psikologis = [
    [
        'nama' => 'Depresi Ringan',
        'progres' => '75%',
        'status' => 'Dalam Proses',
        'status_class' => 'status-aktif'
    ],
    [
        'nama' => 'Anxiety Screening',
        'progres' => '100%',
        'status' => 'Selesai',
        'status_class' => 'status-selesai'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Talk Zone</title>
  <link rel="stylesheet" href="../../konselink/home page/hp.css"> 
  <link rel="stylesheet" href="dashboarde.css"> 
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

    function confirmLogout() {
        if (confirm("Apakah Anda yakin ingin logout?")) {
            window.location.href = "../../konselink/home page/hp.php";
        }
    }
  </script>

  <header>
    <div class="logo">
      <img src="../../konselink/home page/Screenshot_2025-09-06_143612-removebg-preview.png" alt="Talk Zone Logo" width="30">
      <span>Talk Zone</span>
    </div>
    
    <a href="#" class="btn-login" onclick="confirmLogout(); return false;">Logout</a>
  </header>

  <main class="dashboard-container">
    <div class="dashboard-header">
      <h1>Selamat Datang di Dashboard Anda!</h1>
      <p>Akses fitur-fitur kami untuk mendukung perjalanan kesehatan mentalmu.</p>
    </div>

    
    <div class="dashboard-actions">
        <a href="../fitur/daftar_konseling.php" class="btn-utama">Daftar Konseling</a>
        <a href="../fitur/jadwal_konseling.php" class="btn-utama">Lihat Jadwal Konseling Saya</a>
    </div>

    
    <section class="info-section">
      <h2>Jadwal Konseling Terdekat</h2>
      <div class="info-content">
        <?php foreach ($jadwal_terdekat as $jadwal): ?>
        <div class="info-card">
          <h3><?php echo htmlspecialchars($jadwal['sesi']); ?></h3>
          <p><strong>Tanggal:</strong> <?php echo htmlspecialchars($jadwal['tanggal']); ?></p>
          <p><strong>Waktu:</strong> <?php echo htmlspecialchars($jadwal['waktu']); ?></p>
          <p><strong>Konselor:</strong> <?php echo htmlspecialchars($jadwal['konselor']); ?></p>
          <p><strong>Status:</strong> <span class="status <?php echo htmlspecialchars($jadwal['status_class']); ?>"><?php echo htmlspecialchars($jadwal['status']); ?></span></p>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    
    <section class="info-section">
      <h2>Progres Tes Psikologis</h2>
      <div class="info-content">
        <?php foreach ($tes_psikologis as $tes): ?>
        <div class="info-card">
          <h3><?php echo htmlspecialchars($tes['nama']); ?></h3>
          <p><strong>Progres:</strong> <?php echo htmlspecialchars($tes['progres']); ?></p>
          <p><strong>Status:</strong> <span class="status <?php echo htmlspecialchars($tes['status_class']); ?>"><?php echo htmlspecialchars($tes['status']); ?></span></p>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    
    <section class="info-section">
        <h2>Fitur Utama</h2>
        <div class="fitur-grid">
            
            <div class="fitur-card-static">
                <img src="../../konselink/fitur/Screenshot 2025-10-21 201652.png" alt="Curhat Online">
                <h3>CURHAT ONLINE</h3>
            </div>
            <div class="fitur-card-static">
                <img src="../../konselink/fitur/Screenshot 2025-10-21 201704.png" alt="Jadwal Konseling">
                <h3>JADWAL KONSELING</h3>
            </div>
            <div class="fitur-card-static">
                <img src="../../konselink/fitur/Screenshot 2025-10-21 201712.png" alt="Tes Psikologis">
                <h3>TES PSIKOLOGIS</h3>
            </div>
            <div class="fitur-card-static">
                <img src="../../konselink/fitur/Screenshot 2025-10-21 201733.png" alt="Forum Diskusi">
                <h3>FORUM DISKUSI</h3>
            </div>
            <div class="fitur-card-static">
                <img src="../../konselink/fitur/Screenshot 2025-10-21 201719.png" alt="Emergency Contact">
                <h3>EMERGENCY CONTACT</h3>
            </div>
        </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Talk Zone. Semua Hak Dilindungi.</p>
  </footer>

</body>
</html>