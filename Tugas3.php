<?php

class PembayaranMarket {
    var $kartu;
    var $total;
    var $harga;
    var $diskon;

    function setHarga($hargabeli) {
        $this->harga = $hargabeli;
    }

    function setKartu($status) {
        if ($status == "ya") {
            $this->kartu = $status;
        } else {
            $this->kartu = "tidak";
        }
    }

    function getHarga() {
        return $this->harga;
    }

    function getKartu() {
        return $this->kartu;
    }

    function getDiskon() {
        switch ($this->kartu) {
            case "ya":
                if ($this->harga > 500000) {
                    $this->diskon = 50000;
                } elseif ($this->harga > 100000) {
                    $this->diskon = 15000;
                } else {
                    $this->diskon = 0;
                }
                break;
            case "tidak":
                if ($this->harga > 100000) {
                    $this->diskon = 5000;
                } else {
                    $this->diskon = 0;
                }
                break;
            default:
                $this->diskon = 0;
                break;
        }
        return $this->diskon;
    }

    function getTotalBayar() {
        $this->total = $this->harga - $this->getDiskon();
        return $this->total;
    }
}

$pembelian1 = new PembayaranMarket();
$pembelian1->setHarga(200000);
$pembelian1->setKartu("ya");

echo "Apakah ada kartu member : " . $pembelian1->getKartu() . "\n <br>";
echo "Total belanjaan : " . $pembelian1->getHarga() . "\n <br>";
echo "Diskon: Rp " . $pembelian1->getDiskon() . "\n <br>";
echo "Total Bayar: Rp " . $pembelian1->getTotalBayar() . "\n <br>";
echo "<hr>";

$pembelian2 = new PembayaranMarket();
$pembelian2->setHarga(570000);
$pembelian2->setKartu("ya");

echo "Apakah ada kartu member : ".$pembelian2->getKartu() . "\n <br>";
echo "Total belanjaan : " .$pembelian2->getHarga() . "\n <br>";
echo "Diskon: Rp ".$pembelian2->getDiskon(). "\n <br>";
echo "Total Bayar: Rp " .$pembelian2->getTotalBayar() . "\n <br>";
echo "<hr>";

$pembelian3 = new PembayaranMarket();
$pembelian3->setHarga(120000);
$pembelian3->setKartu("tidak");

echo "Apakah ada kartu member : " . $pembelian3->getKartu() . "\n <br>";
echo "Total belanjaan : " . $pembelian3->getHarga(). "\n <br>";
echo "Diskon: Rp " . $pembelian3->getDiskon() . "\n <br>";
echo "Total Bayar: Rp " . $pembelian3->getTotalBayar(). "\n <br>";
echo "<hr>";

$pembelian4 = new PembayaranMarket();
$pembelian4->setHarga(90000);
$pembelian4->setKartu("tidak");

echo "Apakah ada kartu member : " . $pembelian4->getKartu() . "\n <br>";
echo "Total belanjaan : " . $pembelian4->getHarga() . "\n <br>";
echo "Diskon: Rp " . $pembelian4->getDiskon() . "\n <br>";
echo "Total Bayar: Rp " . $pembelian4->getTotalBayar() . "\n <br>";

?>