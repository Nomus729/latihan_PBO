<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST['nama']);
    $alamat = trim($_POST['alamat']);
    $pekerjaan = trim($_POST['pekerjaan']);

    $stmt = mysqli_prepare($koneksi, "INSERT INTO user (nama, alamat, pekerjaan) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $nama, $alamat, $pekerjaan);
    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    if ($result) {
        header("Location: index.php?pesan=input");
    } else {
        header("Location: index.php?pesan=gagal");
    }
} else {
    header("Location: index.php");
}
exit;
?>
