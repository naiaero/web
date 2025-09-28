<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Registrasi</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <h1>Update data user</h1>
    <form action="updatedata.php" method="post">
        <div class="form-group">
            <label for="nama">Nama Lengkap</label> <br>
            <input type="text" name="nama" id="nama">
        </div>

        <div class="form-group">
            <label for="email">Email</label> <br>
            <input type="email" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="password">Password (Isi jika ingin merubah password)</label> <br>
            <input type="password" name="password" id="password">
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a class="btn btn-danger" href="tampil_data.php">Batal</a>
    </form>
</body>
</html>