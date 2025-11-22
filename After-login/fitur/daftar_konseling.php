<?php
session_start();
include '../../Config/db.php'; 

$message = '';
$success = false;


$konseling_list = [];
try {
    $stmt = $pdo->query("SELECT id, konselor, topik_konseling FROM konseling ORDER BY konselor ASC");
    $konseling_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $message = "Error mengambil data konseling: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        $message = "Anda harus login terlebih dahulu.";
    } else {
        $user_id = $_SESSION['user_id'];
        $tanggal = $_POST['tanggal'];
        $waktu = $_POST['waktu'];
        $konseling_id = $_POST['konseling_id']; 

        
        if (empty($tanggal) || empty($waktu) || empty($konseling_id)) {
            $message = "Tanggal, waktu, dan jenis konseling wajib diisi.";
        } else {
            try {
                
                $check_stmt = $pdo->prepare("SELECT id FROM konseling_registrasi WHERE tanggal = ? AND waktu = ? AND konseling_id = ?");
                $check_stmt->execute([$tanggal, $waktu, $konseling_id]);
                if ($check_stmt->rowCount() > 0) {
                    $message = "Jadwal untuk waktu dan konselor ini sudah terisi. Silakan pilih waktu atau konselor lain.";
                } else {
                    
                    $stmt = $pdo->prepare("INSERT INTO konseling_registrasi (user_id, konseling_id, tanggal, waktu) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$user_id, $konseling_id, $tanggal, $waktu]);

                    if ($stmt->rowCount() > 0) {
                        $success = true;
                        $message = "Pendaftaran konseling berhasil! Jadwal Anda telah disimpan.";
                    } else {
                        $message = "Terjadi kesalahan saat mendaftar. Silakan coba lagi.";
                    }
                }
            } catch(PDOException $e) {
                $message = "Error: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Konseling - Talk Zone</title>
  <link rel="stylesheet" href="../../konselink/home page/hp.css">
  <link rel="stylesheet" href="daftar_konseling_style.css">
</head>
<body>

  <div class="form-container">
    <a href="../dashboard/dashboard.php" class="back-button">←</a>

    <div class="form-header">
      <h2>Daftar Konseling</h2>
      <p>Isi formulir di bawah ini untuk menjadwalkan sesi konseling Anda.</p>
    </div>

    <?php if ($message): ?>
        <div class="message <?php echo $success ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <?php if (!$success): ?>
    <form method="POST">
      <div class="form-group">
        <label for="tanggal">Tanggal Konseling:</label>
        <input type="date" id="tanggal" name="tanggal" required>
      </div>

      <div class="form-group">
        <label for="waktu">Waktu Konseling:</label>
        <input type="time" id="waktu" name="waktu" required>
      </div>

      <div class="form-group">
        <label for="konseling_id">Pilih Jenis Konseling:</label>
        <select id="konseling_id" name="konseling_id" required>
          <option value="">Pilih Jenis Konseling</option>
          <?php foreach ($konseling_list as $item): ?>
              <option value="<?php echo htmlspecialchars($item['id']); ?>">
                  <?php echo htmlspecialchars($item['konselor']); ?> - <?php echo htmlspecialchars($item['topik_konseling']); ?>
              </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-actions">
        <a href="javascript:history.back()" class="btn-back">Kembali</a>
        <button type="submit" class="btn-daftar">Daftar</button>
      </div>
    </form>
    <?php else: ?>
        <div style="text-align: center; margin-top: 20px;">
            <a href="jadwal_konseling.php" class="btn-daftar" style="margin-top: 15px; display: inline-block;">Lihat Jadwal Saya</a>
        </div>
    <?php endif; ?>
  </div>

</body>
</html>