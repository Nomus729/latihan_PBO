<?php

class Belanja{
    public $namaBarang;
    public $harga;
    public $jumlah;
    public $total;

    public function __construct($namaBarang,$harga,$jumlah){
        $this->namaBarang = $namaBarang;
        $this->harga=$harga;
        $this->jumlah=$jumlah;
        $this->total=$harga*$jumlah;
        echo "Constructor : Data Belanja ".$this->namaBarang." dibuat<br>\n";
    }
    
    public function getInfo(){
        return $this->namaBarang."("; 
    }
}

$mie = new Belanja("Indomie",2000,10);

?>