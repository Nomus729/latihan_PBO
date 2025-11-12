<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // pastikan id berupa angka

    $stmt = mysqli_prepare($koneksi, "DELETE FROM user WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: index.php?pesan=hapus");
    } else {
        header("Location: index.php?pesan=gagal");
    }

    mysqli_stmt_close($stmt);
} else {
    header("Location: index.php?pesan=invalid");
}
?>
