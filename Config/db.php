<?php
$servername = "localhost";
$username = "root"; // Default username Laragon
$password = "";     // Default password Laragon
$dbname = "talkzone_db"; // Nama database yang telah dibuat

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set mode error PDO ke exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Koneksi berhasil";
} catch(PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>