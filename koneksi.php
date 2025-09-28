<?php
    $koneksi = new mysqli('localhost', 'root', '', 'pelatihan');

    if ($koneksi -> connect_error){
        die("koneksi ke database gagal:". $koneksi->connect_error);
    }
?>