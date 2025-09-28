<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nama = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'pelanggan';

    if (empty($nama) || empty($email) || empty($_POST['password'])) {
        echo "Error: Semua field harus diisi! <a href='index.html'>Kembali</a>";
    }  else {
        $query = "INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("ssss", $nama, $email, $password, $role);

        if ($stmt->execute()) {
            echo "<script>alert('Registrasi Berhasil!'); window.location.href = 'login.php';</script>";
        }else {
            if ($koneksi->errno == 1062) {
                echo "Error: Email " . $email . " sudah terdaftar. <a href='signup.php'>Kembali</a>";
            }
            else {
                echo "Error saat registrasi: " . $stmt->error . " <a href='signup.php'>Kembali</a>";
            }
        }$stmt->close();
    }
} else {
    header('Location: login.php');
    exit();
}
$koneksi->close();
?>