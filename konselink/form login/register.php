<?php
include '../../Config/db.php'; 

$message = '';
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    
    if (empty($email) || empty($password) || empty($confirm_password)) {
        $message = "Semua field harus diisi.";
    } elseif ($password !== $confirm_password) {
        $message = "Password dan konfirmasi password tidak cocok.";
    } else {
        try {
           
            $check_stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $check_stmt->execute([$email]);
            if ($check_stmt->rowCount() > 0) {
                $message = "Email ini sudah terdaftar. Silakan gunakan email lain.";
            } else {
                
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

               
                $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
                $stmt->execute([$email, $hashed_password]);

                if ($stmt->rowCount() > 0) {
                    $success = true;
                    $message = "";
                } else {
                    $message = "Terjadi kesalahan saat mendaftar. Silakan coba lagi.";
                }
            }
        } catch(PDOException $e) {
            $message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <div class="login-box">
        <div class="header">
            <div class="logo-box">
                <img src="Screenshot_2025-09-06_143612-removebg-preview.png" alt="Logo" class="logo-img">
            <span class="logo-text">TALK ZONE</span>
        </div>
    </div>

      <h2>Welcome To Talk zone</h2>
      <p class="subtitle"></p>

      <?php if ($message): ?>
          <p class="<?php echo $success ? 'success-message' : 'error-message'; ?>"><?php echo htmlspecialchars($message); ?></p>
      <?php endif; ?>

      <?php if (!$success): ?>
      <form method="POST">
        <label for="email">Email address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">

        <label for="password">Create Password</label>
        <input type="password" id="password" name="password" placeholder="Create your password" required>

        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>

        <button type="submit" class="btn">Sign Up</button>

        <button type="button" class="btn-google">
          <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google">
          Sign in with Google
        </button>
      </form>
      <?php endif; ?>

      <p class="signup-text">Already Have An Account? <a href="login.php">Sign in</a></p>
      <p class="signup-text"><a href="javascript:history.back()">Back</a></p> <!-- Tombol Back -->
    </div>
  </div>
</body>
</html>