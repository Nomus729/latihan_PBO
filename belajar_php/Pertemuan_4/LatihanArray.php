<?php
class MahasiswaPolsub{
    var $Nama;
    var $Kelas;
    var $MataKuliah;
    var $Nilai;
    var $HasilNilai;

    function setNama($nama){
        $this->Nama = $nama;
    } 
    function getNama(){
        return $this->Nama;
    }
    function setKelas($kelas){
        $this->Kelas= $kelas;
    }
    function getKelas(){
        return $this->Kelas;
    }
    function setMataKuliah($matkul){
        $this->MataKuliah=$matkul;
    }
    function getMataKuliah(){
        return $this->MataKuliah;
    }
    function setNilai($nilai){
        $this->Nilai=$nilai;
    }
    function getNilai(){
        return $this->Nilai;
    }
    function getStatus(){
        $status = "";
        if ($this->Nilai>=75){
            $status = "Lulus Kuis" ;
        }
        elseif ($this->Nilai<75){
            $status = "Tidak Lulus Kuis" ;
        }
        return $status;
    }
}

$dataMahasiswa=[
    ["Aditya","SI 2","Pemrograman berorientasi objek",80],
    ["Shinta","SI 2","Pemrograman berorientasi objek",75],
    ["Ineu","SI 2","Pemrograman berorientasi objek",55],
    ["Rakan","SI 3","Pemrograman berorientasi objek",99]
];

for ($i=0;$i<count($dataMahasiswa);$i++){
    $mahasiswa = new MahasiswaPolsub;
    $mahasiswa->setNama($dataMahasiswa[$i][0]);
    $mahasiswa->setKelas($dataMahasiswa[$i][1]); 
    $mahasiswa->setMataKuliah($dataMahasiswa[$i][2]);
    $mahasiswa->setNilai($dataMahasiswa[$i][3]);

    echo "Nama : ".$mahasiswa->getNama()."<br>\n";
    echo "Kelas : ".$mahasiswa->getKelas()."<br>\n";
    echo "Mata Kuliah : ".$mahasiswa->getMataKuliah()."<br>\n";
    echo "Nilai : ".$mahasiswa->getNilai()."<br>\n";
    echo $mahasiswa->getStatus()."<br>\n";
    echo "<hr>";

}

?>