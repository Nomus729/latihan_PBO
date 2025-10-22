<?php

class  BarangHarian{
    var $namaBarang = "Mie Instant";
    var $harga;
    var $jumlah;
    var $total;

    function hitungTotalPembayaran(){
        $this->total = $this->jumlah * $this->harga;

        return $this->total;
    }

    function statusPembayaran(){
        if ($this->total > 50000) return "Mahal";
        else return "Murah";

    }
}

$barang1 = new BarangHarian();
$barang1 -> jumlah = 2;
$barang1 -> harga = 200000;

$barang2 = new BarangHarian();
$barang2 -> namaBarang = "Kopi";
$barang2 -> harga = 15000;
$barang2 -> jumlah = 4;

$barang3 = new BarangHarian();
$barang3 -> namaBarang = "Air mineral";
$barang3 -> harga = 5000;
$barang3 -> jumlah = 5;


echo "<br>";
echo $barang1 -> namaBarang."<br>";
echo $barang1 -> harga."<br>";
echo $barang1 -> hitungTotalPembayaran()."<br>";
echo $barang1 -> statusPembayaran()."<br>";
echo "<br>";
echo $barang2 -> namaBarang."<br>";
echo $barang2 -> harga."<br>";
echo $barang2 -> hitungTotalPembayaran()."<br>";
echo $barang2 -> statusPembayaran()."<br>";
echo "<br>";
echo $barang3 -> namaBarang."<br>";
echo $barang3 -> harga."<br>";
echo $barang3 -> hitungTotalPembayaran()."<br>";
echo $barang3 -> statusPembayaran()."<br>";

?>