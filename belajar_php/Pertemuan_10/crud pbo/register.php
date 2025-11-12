<!DOCTYPE html>
<html>
<head>
    <title>Register User Baru</title>
</head>
<body>
    <h3>Form Pendaftaran User</h3>
    <hr>
    
    <?php 
    if(isset($_GET['error']) && $_GET['error'] == 'exists'){
        echo '<p style="color:red;">Username sudah terdaftar!</p>';
    } 
    ?>

    <form method="POST" action="auth.php?action=register">
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
                <td colspan="3"><input type="submit" value="Daftar"></td>
            </tr>
        </table>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</body>
</html>