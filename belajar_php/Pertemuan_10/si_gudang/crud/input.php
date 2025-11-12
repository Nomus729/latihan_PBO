<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data - CRUD PHP & MySQL</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="judul">
    <h1>Membuat CRUD Dengan PHP dan MySQL</h1>
    <h2>Tambah Data Baru</h2>
  </div>

  <div class="container">
    <a class="tombol" href="index.php">← Kembali ke Data</a>

    <h3>Input Data Baru</h3>
    <form action="input-aksi.php" method="post" class="form-modern">
      <label>Nama</label>
      <input type="text" name="nama" placeholder="Masukkan nama..." required>

      <label>Alamat</label>
      <input type="text" name="alamat" placeholder="Masukkan alamat..." required>

      <label>Pekerjaan</label>
      <input type="text" name="pekerjaan" placeholder="Masukkan pekerjaan..." required>

      <button type="submit" class="tombol">💾 Simpan Data</button>
    </form>
  </div>
</body>
</html>
