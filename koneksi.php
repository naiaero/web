<?php
<<<<<<< HEAD
    $koneksi = new mysqli('localhost', 'root', '', 'pelatihan');

    if ($koneksi -> connect_error){
        die("koneksi ke database gagal:". $koneksi->connect_error);
    }
=======
$host = "localhost";
$user = "root";
$pass = "";
$db = "rental_mobil";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: ". mysqli_connect_error());
} else {
    echo"Koneksi berhasil!";
}
>>>>>>> ccd3c1af9da2290389a643821a268d3b73b84895
?>