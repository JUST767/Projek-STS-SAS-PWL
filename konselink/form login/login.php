<?php

session_start();


include '../../Config/db.php'; 

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    if (empty($email) || empty($password)) {
        $message = "Email dan password harus diisi.";
    } else {
        try {
            
            $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email']; 

                
                header("Location: ../../After-login/dashboard/dashboard.php");
                exit(); 
            } else {
                
                $message = "Email atau password salah.";
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
  <title>Login - Talkzone</title>
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

      <h2>Welcome back</h2>
      <p class="subtitle">Please enter your details</p>

  
      <?php if ($message): ?>
          <p style='color:red; text-align:center;'><?php echo htmlspecialchars($message); ?></p>
      <?php endif; ?>

      
      <form method="POST">
        <label for="email">Email address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <div class="options">
          <label>
            <input type="checkbox" name="remember"> Remember for 30 days
          </label>
          <a href="#">Forgot password</a>
        </div>

        <button type="submit" class="btn">Login</button>

        <button type="button" class="btn-google">
          <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google">
          Sign in with Google
        </button>
      </form>

      <p class="signup-text">Don't have an account? <a href="register.php">Sign up</a></p>
      <p class="signup-text"><a href="javascript:history.back()">Back</a></p>
    </div>
  </div>
</body>
</html>