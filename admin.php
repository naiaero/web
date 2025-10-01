<?php
session_start();
include "koneksi.php"; // koneksi database

// Cek login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// =======================
// QUERY STATISTIK
// =======================

// Jumlah mobil
$qMobil = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM mobil");
$totalMobil = mysqli_fetch_assoc($qMobil)['total'];

// Jumlah mobil tersedia
$qMobilTersedia = mysqli_query($koneksi, "SELECT COUNT(*) AS tersedia FROM mobil WHERE status='tersedia'");
$mobilTersedia = mysqli_fetch_assoc($qMobilTersedia)['tersedia'];

// Jumlah mobil disewa
$qMobilDisewa = mysqli_query($koneksi, "SELECT COUNT(*) AS disewa FROM mobil WHERE status='disewa'");
$mobilDisewa = mysqli_fetch_assoc($qMobilDisewa)['disewa'];

// Jumlah pelanggan
$qPelanggan = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pelanggan");
$totalPelanggan = mysqli_fetch_assoc($qPelanggan)['total'];

// Jumlah transaksi
$qTransaksi = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM transaksi");
$totalTransaksi = mysqli_fetch_assoc($qTransaksi)['total'];

// Jumlah transaksi berjalan (on_going)
$qOnGoing = mysqli_query($koneksi, "SELECT COUNT(*) AS ongoing FROM transaksi WHERE status='on_going'");
$totalOnGoing = mysqli_fetch_assoc($qOnGoing)['ongoing'];

// Jumlah transaksi selesai
$qSelesai = mysqli_query($koneksi, "SELECT COUNT(*) AS selesai FROM transaksi WHERE status='selesai'");
$totalSelesai = mysqli_fetch_assoc($qSelesai)['selesai'];

// Jumlah admin
$qAdmin = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM users WHERE role='admin'");
$totalAdmin = mysqli_fetch_assoc($qAdmin)['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - Rental Mobil</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background: #f4f4f4; }
    header { background: #2c3e50; color: white; padding: 15px; text-align: center; }
    nav { background: #34495e; padding: 10px; }
    nav a { color: white; text-decoration: none; margin: 0 15px; font-weight: bold; }
    nav a:hover { text-decoration: underline; }
    .container { padding: 20px; }
    .card { background: white; padding: 20px; margin: 10px 0; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    .stats { display: flex; flex-wrap: wrap; gap: 20px; }
    .stat-box {
      flex: 1 1 200px;
      background: #ecf0f1;
      padding: 20px;
      border-radius: 8px;
      text-align: center;
    }
    .stat-box h2 { margin: 0; font-size: 2em; }
    .logout {
      float: right; margin-right: 20px;
      background: #e74c3c; padding: 6px 12px;
      border-radius: 4px; text-decoration: none; color: white;
    }
    .logout:hover { background: #c0392b; }
  </style>
</head>
<body>

<header>
  <h1>Dashboard Admin - Rental Mobil</h1>
  <a href="logout.php" class="logout">Logout</a>
</header>

<nav>
  <a href="kelola-mobil.php">Kelola Mobil</a>
  <a href="kelola_pelanggan.php">Kelola Pelanggan</a>
  <a href="kelola_transaksi.php">Kelola Transaksi</a>
  <a href="laporan.php">Laporan</a>
</nav>

<div class="container">
  <div class="card">
    <h2>Selamat Datang, <?php echo $_SESSION['nama']; ?>!</h2>
    <p>Pilih menu di atas untuk mengelola sistem informasi rental mobil.</p>
  </div>

  <div class="card">
    <h3>📊 Statistik Singkat</h3>
    <div class="stats">
      <div class="stat-box">
        <h2><?= $totalMobil; ?></h2>
        <p>Total Mobil</p>
      </div>
      <div class="stat-box">
        <h2><?= $mobilTersedia; ?></h2>
        <p>Mobil Tersedia</p>
      </div>
      <div class="stat-box">
        <h2><?= $mobilDisewa; ?></h2>
        <p>Mobil Disewa</p>
      </div>
      <div class="stat-box">
        <h2><?= $totalPelanggan; ?></h2>
        <p>Total Pelanggan</p>
      </div>
      <div class="stat-box">
        <h2><?= $totalTransaksi; ?></h2>
        <p>Total Transaksi</p>
      </div>
      <div class="stat-box">
        <h2><?= $totalOnGoing; ?></h2>
        <p>Transaksi Berjalan</p>
      </div>
      <div class="stat-box">
        <h2><?= $totalSelesai; ?></h2>
        <p>Transaksi Selesai</p>
      </div>
      <div class="stat-box">
        <h2><?= $totalAdmin; ?></h2>
        <p>Total Admin</p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
