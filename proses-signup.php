<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nama = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (empty($nama) || empty($email) || empty($_POST['password'])) {
        echo "Error: Semua field harus diisi! <a href='index.html'>Kembali</a>";
    }  else {
        $query = "INSERT INTO users (nama, email, password) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("sss", $nama, $email, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Registrasi Berhasil!'); window.location.href = 'login.php';</script>";
        }else {
            if ($koneksi->errno == 1062) {
                echo "Error: Email " . $email . " sudah terdaftar. <a href='index.html'>Kembali</a>";
            }
            else {
                echo "Error saat registrasi: " . $stmt->error . " <a href='index.html'>Kembali</a>";
            }
        }$stmt->close();
    }
} else {
    header('Location: login.php');
    exit();
}
$koneksi->close();
?>