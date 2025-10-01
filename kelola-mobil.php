<?php
session_start();
include "koneksi.php";

// Pastikan hanya admin yang bisa akses
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Lokasi folder upload
$uploadDir = "assets/uploads/";

// ================== PROSES HAPUS ==================
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);

    // hapus file foto juga
    $cek = mysqli_query($koneksi, "SELECT foto FROM mobil WHERE mobil_id=$id");
    $row = mysqli_fetch_assoc($cek);
    if ($row && !empty($row['foto']) && file_exists($uploadDir.$row['foto'])) {
        unlink($uploadDir.$row['foto']);
    }

    mysqli_query($koneksi, "DELETE FROM mobil WHERE mobil_id = $id");
    header("Location: kelola_mobil.php");
    exit;
}

// ================== PROSES TAMBAH ==================
if (isset($_POST['tambah'])) {
    $plat = mysqli_real_escape_string($koneksi, $_POST['plat_nomor']);
    $merk = mysqli_real_escape_string($koneksi, $_POST['merk']);
    $tipe = mysqli_real_escape_string($koneksi, $_POST['tipe']);
    $tahun = intval($_POST['tahun']);
    $harga = floatval($_POST['harga_sewa']);

    $foto = null;
    if (!empty($_FILES['foto']['name'])) {
        $foto = time() . "_" . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $uploadDir . $foto);
    }

    mysqli_query($koneksi, "INSERT INTO mobil (plat_nomor, merk, tipe, tahun, harga_sewa, foto, status) 
                            VALUES ('$plat','$merk','$tipe','$tahun','$harga','$foto','tersedia')");
    header("Location: kelola_mobil.php");
    exit;
}

// ================== PROSES EDIT ==================
if (isset($_POST['edit'])) {
    $id = intval($_POST['mobil_id']);
    $plat = mysqli_real_escape_string($koneksi, $_POST['plat_nomor']);
    $merk = mysqli_real_escape_string($koneksi, $_POST['merk']);
    $tipe = mysqli_real_escape_string($koneksi, $_POST['tipe']);
    $tahun = intval($_POST['tahun']);
    $harga = floatval($_POST['harga_sewa']);
    $status = $_POST['status'];

    // cek jika ada upload foto baru
    $foto_update = "";
    if (!empty($_FILES['foto']['name'])) {
        $foto = time() . "_" . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $uploadDir . $foto);

        // hapus foto lama
        $cek = mysqli_query($koneksi, "SELECT foto FROM mobil WHERE mobil_id=$id");
        $row = mysqli_fetch_assoc($cek);
        if ($row && !empty($row['foto']) && file_exists($uploadDir.$row['foto'])) {
            unlink($uploadDir.$row['foto']);
        }

        $foto_update = ", foto='$foto'";
    }

    mysqli_query($koneksi, "UPDATE mobil SET 
        plat_nomor='$plat',
        merk='$merk',
        tipe='$tipe',
        tahun='$tahun',
        harga_sewa='$harga',
        status='$status'
        $foto_update
        WHERE mobil_id=$id");
    header("Location: kelola_mobil.php");
    exit;
}

// ================== AMBIL DATA MOBIL ==================
$dataMobil = mysqli_query($koneksi, "SELECT * FROM mobil ORDER BY mobil_id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Mobil - Rental Mobil</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
    h1 { text-align: center; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
    th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
    th { background: #2c3e50; color: white; }
    .form-box { background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; }
    input, select { padding: 8px; margin: 5px; }
    button { padding: 8px 15px; background: #27ae60; color: white; border: none; border-radius: 5px; cursor: pointer; }
    button:hover { background: #219150; }
    .hapus { background: #e74c3c; }
    .hapus:hover { background: #c0392b; }
    .edit { background: #2980b9; }
    .edit:hover { background: #1c5985; }
    img { max-width: 100px; border-radius: 5px; }
  </style>
</head>
<body>

<h1>Kelola Mobil</h1>

<!-- FORM TAMBAH MOBIL -->
<div class="form-box">
  <h3>Tambah Mobil Baru</h3>
  <form method="post" enctype="multipart/form-data">
    <input type="text" name="plat_nomor" placeholder="Plat Nomor" required>
    <input type="text" name="merk" placeholder="Merk Mobil" required>
    <input type="text" name="tipe" placeholder="Tipe Mobil" required>
    <input type="number" name="tahun" placeholder="Tahun" required>
    <input type="number" step="0.01" name="harga_sewa" placeholder="Harga Sewa" required>
    <input type="file" name="foto" accept="image/*">
    <button type="submit" name="tambah">Tambah</button>
  </form>
</div>

<!-- DAFTAR MOBIL -->
<table>
  <tr>
    <th>ID</th>
    <th>Plat Nomor</th>
    <th>Merk</th>
    <th>Tipe</th>
    <th>Tahun</th>
    <th>Harga Sewa</th>
    <th>Foto</th>
    <th>Status</th>
    <th>Aksi</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($dataMobil)) { ?>
  <tr>
    <td><?= $row['mobil_id']; ?></td>
    <td><?= $row['plat_nomor']; ?></td>
    <td><?= $row['merk']; ?></td>
    <td><?= $row['tipe']; ?></td>
    <td><?= $row['tahun']; ?></td>
    <td>Rp <?= number_format($row['harga_sewa'],0,',','.'); ?></td>
    <td>
      <?php if (!empty($row['foto'])) { ?>
        <img src="<?= $uploadDir.$row['foto']; ?>" alt="Foto Mobil">
      <?php } else { ?>
        (Tidak ada foto)
      <?php } ?>
    </td>
    <td><?= $row['status']; ?></td>
    <td>
      <!-- Form Edit -->
      <form method="post" enctype="multipart/form-data" style="display:inline-block;">
        <input type="hidden" name="mobil_id" value="<?= $row['mobil_id']; ?>">
        <input type="text" name="plat_nomor" value="<?= $row['plat_nomor']; ?>" required>
        <input type="text" name="merk" value="<?= $row['merk']; ?>" required>
        <input type="text" name="tipe" value="<?= $row['tipe']; ?>" required>
        <input type="number" name="tahun" value="<?= $row['tahun']; ?>" required>
        <input type="number" step="0.01" name="harga_sewa" value="<?= $row['harga_sewa']; ?>" required>
        <select name="status">
          <option value="tersedia" <?= $row['status']=='tersedia'?'selected':''; ?>>Tersedia</option>
          <option value="disewa" <?= $row['status']=='disewa'?'selected':''; ?>>Disewa</option>
        </select>
        <input type="file" name="foto" accept="image/*">
        <button type="submit" name="edit" class="edit">Simpan</button>
      </form>

      <!-- Tombol Hapus -->
      <a href="kelola_mobil.php?hapus=<?= $row['mobil_id']; ?>" onclick="return confirm('Yakin hapus mobil ini?')">
        <button class="hapus">Hapus</button>
      </a>
    </td>
  </tr>
  <?php } ?>
</table>

</body>
</html>
