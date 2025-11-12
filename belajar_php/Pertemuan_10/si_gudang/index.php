<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat CRUD Dengan PHP dan MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="judul">
        <h1>Membuat CRUD Dengan PHP dan MySQL</h1>
        <h2>Menampilkan Data dari Database</h2>
    </div>

    <div class="container">
        <?php 
        if(isset($_GET['pesan'])){
            $pesan = $_GET['pesan'];
            if($pesan == "input"){
                echo "<div class='alert alert-success'>✅ Data berhasil diinput.</div>";
            }else if($pesan == "update"){
                echo "<div class='alert alert-info'>✏️ Data berhasil diupdate.</div>";
            }else if($pesan == "hapus"){
                echo "<div class='alert alert-danger'>🗑️ Data berhasil dihapus.</div>";
            }
        }
        ?>

        <a class="tombol" href="input.php">+ Tambah Data Baru</a>

        <h3>Data User</h3>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Opsi</th>
            </tr>
            <?php 
            include "koneksi.php";
            $query_mysql = mysqli_query($koneksi, "SELECT * FROM user") or die(mysqli_error($koneksi));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)){
            ?>
            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['alamat']; ?></td>
                <td><?= $data['pekerjaan']; ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?= $data['id']; ?>">Edit</a>
                    <a class="hapus" href="hapus.php?id=<?= $data['id']; ?>" 
                    onclick="return confirm('Yakin ingin menghapus data ini?');">
                        Hapus
                    </a>

                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
