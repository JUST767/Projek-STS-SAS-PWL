<?php
session_start();
include '../../Config/db.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php"); // Ganti path ke halaman login Anda
    exit();
}

$user_id = $_SESSION['user_id'];
$message = '';
$jadwal_data = null;


$reg_id = $_GET['id'] ?? null;

if (!$reg_id) {
    $message = "ID Jadwal tidak ditemukan.";
} else {
    try {

        $stmt = $pdo->prepare("
            SELECT kr.id, kr.tanggal, kr.waktu, k.konselor, k.topik_konseling
            FROM konseling_registrasi kr
            JOIN konseling k ON kr.konseling_id = k.id
            WHERE kr.id = ? AND kr.user_id = ?
        ");
        $stmt->execute([$reg_id, $user_id]);
        $jadwal_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$jadwal_data) {
            $message = "Jadwal tidak ditemukan atau Anda tidak memiliki izin untuk mengeditnya.";
        }
    } catch(PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && $jadwal_data) {
    $tanggal_baru = $_POST['tanggal'];
    $waktu_baru = $_POST['waktu'];

   
    if (empty($tanggal_baru) || empty($waktu_baru)) {
        $message = "Tanggal dan waktu wajib diisi.";
    } else {
        try {
         
            $stmt = $pdo->prepare("UPDATE konseling_registrasi SET tanggal = ?, waktu = ? WHERE id = ?");
            $stmt->execute([$tanggal_baru, $waktu_baru, $reg_id]);

            if ($stmt->rowCount() > 0) {
                $message = "Jadwal berhasil diperbarui.";
         
                $jadwal_data['tanggal'] = $tanggal_baru;
                $jadwal_data['waktu'] = $waktu_baru;
            } else {
                $message = "Tidak ada perubahan yang dilakukan atau terjadi kesalahan.";
            }
        } catch(PDOException $e) {
            $message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Jadwal - Talk Zone</title>
  <link rel="stylesheet" href="../../konselink/home page/hp.css">
  <style>
    body {
      background: #f4f9ff;
      font-family: 'Poppins', Arial, sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      width: 90%;
      max-width: 500px;
      padding: 40px;
      position: relative;
    }

    .form-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-header h2 {
      color: #b8e9a5; /* Warna hijau */
      font-size: 2rem;
      margin-bottom: 5px;
      font-weight: 700;
    }

    .form-header p {
      color: #666;
      font-size: 1rem;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      color: #333;
      font-weight: 500;
    }

    .form-group input {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      font-size: 1rem;
      transition: border-color 0.3s;
      box-sizing: border-box;
      font-family: inherit;
    }

    .form-group input:focus {
      outline: none;
      border-color: #A8D9FF;
      box-shadow: 0 0 0 3px rgba(168, 217, 255, 0.2);
    }

    .form-actions {
      display: flex;
      justify-content: space-between;
      gap: 15px;
      margin-top: 30px;
    }

    .btn-back,
    .btn-save {
      flex: 1;
      padding: 14px;
      border: none;
      border-radius: 12px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .btn-back {
      background-color: #f0f0f0;
      color: #333;
    }

    .btn-back:hover {
      background-color: #e0e0e0;
      transform: translateY(-2px);
    }

    .btn-save {
      background-color: #A8D9FF;
      color: white;
    }

    .btn-save:hover {
      background-color: #8ac9fe;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(168, 217, 255, 0.4);
    }

    .message {
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 12px;
      text-align: center;
      font-weight: 500;
      font-size: 0.95rem;
      line-height: 1.5;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .message.error {
      background-color: #fff5f5;
      color: #d32f2f;
      border: 1px solid #ffcdd2;
    }

    .message.success {
      background-color: #f1f8e9;
      color: #689f38;
      border: 1px solid #dcedc8;
    }

    .detail-info {
      background-color: #f9f9f9;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
      border-left: 4px solid #b8e9a5;
    }

    .detail-info h4 {
      margin-top: 0;
      color: #333;
    }

    .detail-info p {
      margin: 5px 0;
      color: #555;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <div class="form-header">
      <h2>Edit Jadwal</h2>
      <p>Perbarui detail sesi konseling Anda.</p>
    </div>

    <?php if ($message): ?>
        <div class="message <?php echo strpos($message, 'berhasil') !== false ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <?php if ($jadwal_data): ?>
    <div class="detail-info">
        <h4>Detail Konseling:</h4>
        <p><strong>Konselor:</strong> <?php echo htmlspecialchars($jadwal_data['konselor']); ?></p>
        <p><strong>Topik:</strong> <?php echo htmlspecialchars($jadwal_data['topik_konseling']); ?></p>
    </div>
    <form method="POST">
      <div class="form-group">
        <label for="tanggal">Tanggal Baru:</label>
        <input type="date" id="tanggal" name="tanggal" value="<?php echo htmlspecialchars($jadwal_data['tanggal']); ?>" required>
      </div>

      <div class="form-group">
        <label for="waktu">Waktu Baru:</label>
        <input type="time" id="waktu" name="waktu" value="<?php echo htmlspecialchars($jadwal_data['waktu']); ?>" required>
      </div>

      <div class="form-actions">
        <a href="jadwal_konseling.php" class="btn-back">Kembali</a>
        <button type="submit" class="btn-save">Simpan Perubahan</button>
      </div>
    </form>
    <?php endif; ?>
  </div>

</body>
</html>