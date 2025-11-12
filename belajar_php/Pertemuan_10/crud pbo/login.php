<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
</head>
<body>
    <h3>Login Aplikasi</h3>
    <hr>

    <?php 
    if(isset($_GET['error']) && $_GET['error'] == 'gagal'){
        echo '<p style="color:red;">Username atau password salah!</p>';
    } 
    if(isset($_GET['register']) && $_GET['register'] == 'success'){
        echo '<p style="color:green;">Pendaftaran berhasil! Silakan Login.</p>';
    } 
    ?>
    
    <form method="POST" action="auth.php?action=login">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
    <p>Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
</body>
</html>