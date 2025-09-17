<?php

class manusia{
    public $nama;
    public $umur;
    public $gender;

    function bicara(){
        echo "Selamat Datang";
    }

    function getInfo(){
        echo "Nama= ".$this->nama."<br/>";
        echo "Umur= ".$this->umur."<br/>";
        echo "JK= ".$this->gender."<br/>";
    }
}

class ayah extends manusia{
    function pekerjaan(){
        echo "Pegawai Negeri Sipil";
    }
}

class ibu extends manusia{
    function pekerjaan(){
        echo "Ibu Rumah Tangga";
    }
}

class anak extends manusia{
    function pekerjaan(){
        echo "Pelajar";
    }
}

$ObjekAyah=new ayah();
$ObjekAyah->nama="Budi";
$ObjekAyah->gender="Laki-Laki";
$ObjekAyah->umur="45";
echo "<b>Info Ayah</b><br/>";
$ObjekAyah->getInfo();
$ObjekAyah->pekerjaan();

$ObjekIbu = new ibu();
$ObjekIbu->nama="Dini";
$ObjekIbu->gender="Perempuan";
$ObjekIbu->umur="38";
echo "<b>Info Ibu</b><br/>";
$ObjekIbu->getInfo();
$ObjekIbu->pekerjaan();

$ObjekAnak=new anak();
$ObjekAnak->nama="Ardi";
$ObjekAnak->gender="Laki-Laki";
$ObjekAnak->umur="15";
echo "<b>Info Anak</b><br/>";
$ObjekAnak->getInfo();
$ObjekAnak->pekerjaan();

?>