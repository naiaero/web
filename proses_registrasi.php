<?php
    require_once 'koneksi.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (empty($nama) || empty($email) || empty($_POST['password'])){
            echo 'error: semua field harus diisi <a href = "coba.html">kembali</a>';
        }
        else{
            $query = "insert into users (nama, email, password) values (?,?,?)";
            $stmt = $koneksi->prepare($query);
            $stmt->bind_param("sss", $nama, $email, $password);
        
            if($stmt->execute()){
                echo "<h1>Registrasi Berhasil</h1>";
                echo "<p>Selamat, ". $nama. "! Data anda telah disimpan.</p>";
                echo '<a href = "coba.html"> Kembali ke Form</a> | <a href="tampil_data.php">Lihat Data</a>';
            }
            else{
                if ($koneksi->errno == 1062){
                    echo 'Error: Email '. $email. ' sudah terdaftar. <a href ="coba.html">Kembali</a>';
                }
                else{
                    echo 'Error saat registrasi: '. $stmt->error . ' <a href ="coba.html">Kembali</a>';
                }
            }
            $stmt->close();
        }
}  
else{
    header('location:coba.html');
    exit();
}

$koneksi->close();
?>