<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST['id']);
    $nama = trim($_POST['nama']);
    $alamat = trim($_POST['alamat']);
    $pekerjaan = trim($_POST['pekerjaan']);

    $stmt = mysqli_prepare($koneksi, "UPDATE user SET nama = ?, alamat = ?, pekerjaan = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $alamat, $pekerjaan, $id);
    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    if ($result) {
        header("Location: index.php?pesan=update");
    } else {
        header("Location: index.php?pesan=gagal");
    }
} else {
    header("Location: index.php");
}
exit;
?>
