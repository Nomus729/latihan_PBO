<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data - CRUD PHP & MySQL</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="judul">
    <h1>Membuat CRUD Dengan PHP dan MySQL</h1>
    <h2>Edit Data User</h2>
  </div>

  <div class="container">
    <a class="tombol" href="index.php">← Kembali ke Data</a>

    <h3>Edit Data</h3>
    <?php
    include "koneksi.php";
    $id = intval($_GET['id']); 

    $stmt = mysqli_prepare($koneksi, "SELECT * FROM user WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if ($data):
    ?>
    <form action="update.php" method="post" class="form-modern">
      <input type="hidden" name="id" value="<?= $data['id']; ?>">

      <label>Nama</label>
      <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>

      <label>Alamat</label>
      <input type="text" name="alamat" value="<?= htmlspecialchars($data['alamat']); ?>" required>

      <label>Pekerjaan</label>
      <input type="text" name="pekerjaan" value="<?= htmlspecialchars($data['pekerjaan']); ?>" required>

      <button type="submit" class="tombol">💾 Simpan Perubahan</button>
    </form>
    <?php else: ?>
      <p>Data tidak ditemukan.</p>
    <?php endif; ?>
  </div>
</body>
</html>
