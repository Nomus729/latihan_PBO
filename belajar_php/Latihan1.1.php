<?php
class Mobil{
    var $JumlahRoda = 4;
    var $Warna = "Biru";
    var $BahanBakar = "Bensin";
    var $harga = 12000000;
    var $merek = "A";

    public function getJumlahRoda(){
        return "$this->JumlahRoda";
    }

    public function statusHarga(){

    }
}

$object1 = new Mobil(); //Objeck
$object2 = new Mobil();
$object3 = new Mobil();

echo $object1->getJumlahRoda();
?>