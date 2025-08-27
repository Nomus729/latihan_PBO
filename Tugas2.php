<?php
//Tugas Pertemuan 2 - TOKO PEGADAIAN SYARIAH

Class Angsuran{
    var $pinjaman;
    var $bunga = 0.1 ;
    var $lama_angsuran;
    var $total_pinjaman;
    var $Besar_angsuran;
    var $hari_terlambat;
    var $denda = 0.0015;
    var $besar_lambat;

    function pinjaman(){
        $this->total_pinjaman = ($this-> pinjaman * $this-> bunga)+$this->pinjaman;
        return $this->total_pinjaman;
    }   
    function angsuran(){
       $this->Besar_angsuran = $this->total_pinjaman / $this->lama_angsuran;
       return $this->Besar_angsuran;
    }
    function denda(){
        $this->besar_lambat = ($this-> Besar_angsuran * $this->denda)*$this->hari_terlambat ;
        return $this->besar_lambat;
    }
    function TotalPembayaranAngsuran(){
        $total_angsuran = $this->Besar_angsuran + $this-> besar_lambat;
        return $total_angsuran;
    }
}

$objekUtang1 = new Angsuran();
$objekUtang1->pinjaman = 1000000;
$objekUtang1->lama_angsuran = 5;
$objekUtang1->hari_terlambat = 40;
$objekUtang1 ->pinjaman();
$objekUtang1->angsuran();
$objekUtang1->denda();

echo "Besar pinjaman :". $objekUtang1->pinjaman."<br>";
echo "TOtal bunga : ". "10%"."<br>";
echo "Total pinjaman :". $objekUtang1->total_pinjaman."<br>";
echo "Lama angsuran (Bulan):". $objekUtang1->lama_angsuran."<br>";
echo "Besaran angsuran : Rp". $objekUtang1->Besar_angsuran."<br>";
echo "Keterlambatan angsuran (Hari): ". $objekUtang1->hari_terlambat."<br>";
echo "Denda keterlambatan :". $objekUtang1->besar_lambat."<br>";
echo "Besaran pembayaran :". $objekUtang1->TotalPembayaranAngsuran()."<br>";
echo "<br>";

$objekUtang2 = new Angsuran();
$objekUtang2->pinjaman = 2000000;
$objekUtang2->lama_angsuran = 5;
$objekUtang2->hari_terlambat = 40;
$objekUtang2 ->pinjaman();
$objekUtang2->angsuran();
$objekUtang2->denda();

echo "Besar pinjaman :". $objekUtang2->pinjaman."<br>";
echo "TOtal bunga : ". "10%"."<br>";
echo "Total pinjaman :". $objekUtang2->total_pinjaman."<br>";
echo "Lama angsuran (Bulan):". $objekUtang2->lama_angsuran."<br>";
echo "Besaran angsuran : Rp". $objekUtang2->Besar_angsuran."<br>";
echo "Keterlambatan angsuran (Hari): ". $objekUtang2->hari_terlambat."<br>";
echo "Denda keterlambatan :". $objekUtang2->besar_lambat."<br>";
echo "Besaran pembayaran :". $objekUtang2->TotalPembayaranAngsuran()."<br>";
echo "<br>";
?>