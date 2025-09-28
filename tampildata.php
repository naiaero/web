<?php
    require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <tittle>Data Pengguna</tittle>
</head>
<body>

    <h1>Data Pengguna Terdaftar</h1>
    <table border = "1" cellpadding = "10" cellspacing = "0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Registrasi</th>
            </tr>
        </thead>
        <?php
            $query = "SELECT * FROM users";
            $result = $koneksi->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['tanggal_registrasi'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data pengguna.</td></tr>";
            }

            $koneksi->close();
        ?>
    </table>

</body>
</html>