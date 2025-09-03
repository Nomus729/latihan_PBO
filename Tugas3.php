<?php

Class PembayaranMarket{
    var $kartu;
    var $total;
    var $harga;
    var $diskon;
    var $pembayaran;

    function punyaKartu($x){            
        $this->kartu=$x;
        switch ($x){
            case "ya":
                $x = 1;
                break;
            case "tidak":
                $x = 0;
                break;
        }
    
        switch ($x){
        case 1:
            if ($this->harga > 500000) $this->diskon = 50000;
            elseif ($this->harga > 100000) $this->diskon = 15000;
            else $this->diskon=0;
            break;
        case 0:
            if ($this->harga>100000) $this->diskon = 5000;
            else $this->diskon=0;
            break;
       }
        return $this->kartu; 
    }


    function hargaAkhir(){
        $this->total = $this->harga - $this->diskon; 
        return $this->total;
    }
}

$pembelian1 = new PembayaranMarket;
$pembelian1->harga = 200000;


echo "Apakah ada kartu member : ".$pembelian1->punyaKartu("ya"). "\n <br>";
echo "Total belanjaan : ". $pembelian1->harga. "\n <br>";
echo "Diskon: Rp ". $pembelian1->diskon. "\n <br>";
echo "Total Bayar: Rp ". $pembelian1->hargaAkhir()."\n <br>";

$pembelian2 = new PembayaranMarket;
$pembelian2->harga = 570000;

echo "<hr>";
echo "Apakah ada kartu member : ".$pembelian2->punyaKartu("ya"). "\n <br>";
echo "Total belanjaan : ". $pembelian2->harga. "\n <br>";
echo "Diskon: Rp ". $pembelian2->diskon. "\n <br>";
echo "Total Bayar: Rp ". $pembelian2->hargaAkhir()."\n <br>";

$pembelian3 = new PembayaranMarket;
$pembelian3->harga = 120000;

echo "<hr>";
echo "Apakah ada kartu member : ".$pembelian3->punyaKartu("tidak"). "\n <br>";
echo "Total belanjaan : ". $pembelian3->harga. "\n <br>";
echo "Diskon: Rp ". $pembelian3->diskon. "\n <br>";
echo "Total Bayar: Rp ". $pembelian3->hargaAkhir()."\n <br>";

$pembelian4 = new PembayaranMarket;
$pembelian4->harga = 90000;

echo "<hr>";
echo "Apakah ada kartu member : ".$pembelian4->punyaKartu("tidak"). "\n <br>";
echo "Total belanjaan : ". $pembelian4->harga. "\n <br>";
echo "Diskon: Rp ". $pembelian4->diskon. "\n <br>";
echo "Total Bayar: Rp ". $pembelian4->hargaAkhir()."\n <br>";
?>