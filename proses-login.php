<?php
session_start();
include "koneksi.php"; // file koneksi yang sudah kita buat

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    // Cek email di database
    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password (pastikan disimpan pakai password_hash saat registrasi)
        if (password_verify($password, $user['password'])) {
            // Buat session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['nama']    = $user['nama'];
            $_SESSION['role']    = $user['role'];

            // cek kondisi: email & password tertentu diarahkan ke admin
            if ($user['email'] === "admin@example.com" && $password === "admin123") {
                header("Location: admin.php");
                exit;
            } else {
                header("Location: index.php"); // halaman user
                exit;
            }
        } else {
            echo "<script>alert('Password salah!'); window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!'); window.location.href = 'login.php';</script>";
    }
}
?>
