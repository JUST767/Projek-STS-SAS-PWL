<?php
session_start();
include '../../Config/db.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php"); 
    exit();
}

$user_id = $_SESSION['user_id'];
$message = '';



// 1. DELETE
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $reg_id = $_GET['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM konseling_registrasi WHERE id = ? AND user_id = ?");
        $stmt->execute([$reg_id, $user_id]);
        if ($stmt->rowCount() > 0) {
            $message = "Jadwal berhasil dibatalkan.";
        } else {
            $message = "Jadwal tidak ditemukan atau Anda tidak memiliki izin untuk menghapusnya.";
        }
    } catch(PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}

// 2. UPDATE (Status)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $reg_id = $_POST['reg_id'];
    $new_status = $_POST['status'];
    if (in_array($new_status, ['Terjadwal', 'Selesai', 'Dibatalkan'])) {
        try {
            $stmt = $pdo->prepare("UPDATE konseling_registrasi SET status = ? WHERE id = ? AND user_id = ?");
            $stmt->execute([$new_status, $reg_id, $user_id]);
            if ($stmt->rowCount() > 0) {
                $message = "Status jadwal berhasil diperbarui.";
            } else {
                $message = "Jadwal tidak ditemukan atau Anda tidak memiliki izin untuk mengubahnya.";
            }
        } catch(PDOException $e) {
            $message = "Error: " . $e->getMessage();
        }
    } else {
        $message = "Status tidak valid.";
    }
}

// 3. READ (Ambil jadwal pengguna)
try {
    $stmt = $pdo->prepare("
        SELECT kr.id, k.konselor, k.topik_konseling, kr.tanggal, kr.waktu, kr.status, kr.created_at
        FROM konseling_registrasi kr
        JOIN konseling k ON kr.konseling_id = k.id
        WHERE kr.user_id = ?
        ORDER BY kr.tanggal ASC, kr.waktu ASC
    ");
    $stmt->execute([$user_id]);
    $jadwal_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $message = "Error mengambil data jadwal: " . $e->getMessage();
    $jadwal_list = [];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Konseling Saya - Talk Zone</title>
  <link rel="stylesheet" href="../../konselink/home page/hp.css"> 
  <link rel="stylesheet" href="jadwal.css"> 
</head>
<body>
 
  <canvas id="backgroundCanvas"></canvas>

  <div class="jadwal-container">
    <!-- Tombol Back -->
    <a href="../dashboard/dashboard.php" class="btn-back">
      <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M19 12H5l7-7v14l-7-7z"/></svg>
      Kembali ke Dashboard
    </a>

    <div class="jadwal-header">
      <h2>Jadwal Konseling Saya</h2>
      <p>Daftar sesi konseling yang telah Anda daftarkan.</p>
    </div>

    <?php if ($message): ?>
        <div class="message"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <?php if (empty($jadwal_list)): ?>
        <div class="empty-state">
            <svg width="80" height="80" fill="#b8e9a5" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm6 0v-7h2v7h-2zm4 0h-2V7h2v10z"/></svg>
            <p>Anda belum memiliki jadwal konseling.</p>
            <a href="daftar_konseling.php" class="btn-primary">Daftar Sekarang</a>
        </div>
    <?php else: ?>
        <div class="jadwal-grid">
            <?php foreach ($jadwal_list as $jadwal): ?>
            <div class="jadwal-card">
                <div class="card-header">
                    <span><?php echo htmlspecialchars($jadwal['konselor']); ?></span>
                    <span class="status <?php echo strtolower(str_replace(' ', '-', $jadwal['status'])); ?>">
                        <?php echo htmlspecialchars($jadwal['status']); ?>
                    </span>
                </div>
                <div class="card-body">
                    <p><strong>Topik:</strong> <?php echo htmlspecialchars($jadwal['topik_konseling']); ?></p>
                    <p><strong>Tanggal:</strong> <?php echo date('d M Y', strtotime($jadwal['tanggal'])); ?></p>
                    <p><strong>Waktu:</strong> <?php echo date('H:i', strtotime($jadwal['waktu'])); ?></p>
                </div>
                <div class="card-actions">
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="reg_id" value="<?php echo $jadwal['id']; ?>">
                        <input type="hidden" name="status" value="<?php echo $jadwal['status'] === 'Terjadwal' ? 'Selesai' : 'Terjadwal'; ?>">
                        <button type="submit" name="update_status" class="btn-action btn-selesai">
                            <?php echo $jadwal['status'] === 'Terjadwal' ? 'Tandai Selesai' : 'Kembalikan'; ?>
                        </button>
                    </form>
                    <a href="?action=delete&id=<?php echo $jadwal['id']; ?>" class="btn-action btn-batalkan" onclick="return confirm('Yakin ingin membatalkan jadwal ini?')">
                        Batalkan
                    </a>
                    
                    <a href="edit_jadwal.php?id=<?php echo $jadwal['id']; ?>" class="btn-action btn-edit">
                        Edit
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
  </div>

  <script src="jadwal_script.js"></script> 
</body>
</html>