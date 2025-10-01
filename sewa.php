<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Rental Mobil</title>
  <link rel="stylesheet" href="assets/css/sewa.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="body-sewa">
  <!-- Header -->
  <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:32px;">
    <tr>
      <td align="left" style="font-family:cursive;font-size:24px;font-weight:bold;padding:24px 0 16px 32px;">
        <img src="assets/img/toy-car.png">
      </td>
      <td align="right" style="padding:24px 32px 16px 0;">
        <span style="font-family:sans-serif;font-size:14px;">
          <a href="index.php" style="margin-right:24px;text-decoration:none;color:#222;">Tentang Kami</a>
          <button class="btn-pes" onclick="location.href='logout.php'">Logout</button>
        </span>
      </td>
    </tr>
  </table>

  <!-- Intro -->
  <div style="margin-left:32px;margin-bottom:24px;">
    <div style="font-family:sans-serif;font-size:13px;color:#444;">Sewa</div>
    <div style="font-family:sans-serif;font-size:36px;font-weight:bold;margin:0;">Mobil</div>
    <div style="font-family:sans-serif;font-size:14px;margin-top:8px;">Temukan mobil sewa terbaik untuk kebutuhan Anda</div>
  </div>

  <!-- Grid Mobil -->
  <table align="center" cellpadding="16" cellspacing="0" style="width:95%;max-width:1200px;">
    <tr>
<?php
$sql = mysqli_query($koneksi, "SELECT * FROM mobil WHERE status='tersedia'");
$col = 0;
while($row = mysqli_fetch_assoc($sql)){
?>
      <td>
        <table width="100%" style="background:radial-gradient(circle at top left, #FFFFFF, #FDFBD4);">
          <tr>
            <td align="center" height="160" style="padding:0;">
              <?php if(!empty($row['foto'])) { ?>
                <img src="uploads/<?php echo $row['foto']; ?>" 
                     alt="<?php echo $row['merk'].' '.$row['tipe']; ?>" 
                     width="100%" height="160" 
                     style="object-fit:cover;border-radius:8px;">
              <?php } else { ?>
                <img src="assets/img/no-image.png" 
                     alt="No Image" width="100%" height="160" 
                     style="object-fit:cover;border-radius:8px;">
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td style="font-family:sans-serif;font-size:13px;padding:8px;">
              <b><?php echo $row['merk'].' '.$row['tipe']; ?></b>
              <span style="float:right;font-weight:bold;">
                Rp<?php echo number_format($row['harga_sewa'],0,',','.'); ?>
              </span><br>
              <span style="color:#888;"><?php echo $row['tahun']; ?> | <?php echo strtoupper($row['status']); ?></span>
            </td>
          </tr>
          <tr>
            <td style="padding:8px;">
              <button style="width:100%;padding:6px 0;border:1px;" class="btn-pes"
                      onclick="location.href='pesan.php?id=<?php echo $row['mobil_id']; ?>'">
                Pesan sekarang
              </button>
            </td>
          </tr>
        </table>
      </td>
<?php
  $col++;
  if($col % 4 == 0) echo "</tr><tr>";
}
?>
    </tr>
  </table>

  <!-- Footer -->
  <div style="margin-top:48px;padding:32px 0 0 0;">
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td style="font-family:cursive;font-size:20px;font-weight:bold;padding-left:32px;">
          <img src="assets/img/toy-car.png">
        </td>
      </tr>
    </table>
    <hr style="margin:18px 32px 18px 32px;border:none;border-top:1px solid #ccc;">
    <div style="font-family:sans-serif;font-size:13px;color:#444;padding-left:32px;">
      © 2025 Rental Mobil. All rights reserved.
    </div>
  </div>
</body>
</html>
