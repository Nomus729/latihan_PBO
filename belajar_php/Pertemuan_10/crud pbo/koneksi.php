<?php
class database{

    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "belajar_oop";
    var $koneksi = "";

    function __construct(){
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if(mysqli_connect_error()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    function tampil_data(){
        $data = mysqli_query($this->koneksi, "select * from tb_barang");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tambah_data($nama_barang, $stok, $harga_beli, $harga_jual){
        mysqli_query($this->koneksi,"insert into tb_barang values ('', '$nama_barang', '$stok', '$harga_beli', '$harga_jual')");
    }

    function tampil_edit_data($id_barang){
        $data = mysqli_query($this->koneksi,"select * from tb_barang where id_barang='$id_barang'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function edit_data($id_barang, $nama_barang, $stok, $harga_beli, $harga_jual){
        mysqli_query($this->koneksi,"update tb_barang set nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' where id_barang='$id_barang'");
    }

    function delete_data($id_barang){
        mysqli_query($this->koneksi, "delete from tb_barang where id_barang='$id_barang'");
    }

    function cari_data($nama_barang){
        $data = mysqli_query($this->koneksi, "select * from tb_barang where nama_barang='$nama_barang'");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function register_user($username, $password, $tipe_user = 'Petugas'){
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $check = mysqli_query($this->koneksi, "SELECT username FROM user WHERE username='$username'");
    if(mysqli_num_rows($check) > 0){
        return false;
    }
    
    $query = "INSERT INTO user (username, password, tipe_user) VALUES ('$username', '$hashed_password', '$tipe_user')";
    mysqli_query($this->koneksi, $query);
    return true;
}

function login_user($username, $password){
    $query = "SELECT * FROM user WHERE username='$username'";
    $data = mysqli_query($this->koneksi, $query);
    
    if (mysqli_num_rows($data) == 1) {
        $user = mysqli_fetch_assoc($data);
        
        if (password_verify($password, $user['password'])) {
            return $user;
        }
    }
    return false;
}
}
?>