<?php
class Kendaraan {
    public $merk;
    public $harga;

    public function __construct($merk, $harga) {
        $this->merk = $merk;
        $this->harga = $harga;
    }
}
?>