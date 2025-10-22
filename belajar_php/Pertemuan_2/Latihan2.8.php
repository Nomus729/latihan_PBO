<?php
class Kendaraan
{
    var $jumlahRoda; var
    $warna;
    var $bahanBakar; var
    $harga;
    var $merek;

    function statusHarga()
    {
        if ($this->harga > 50000000) $status = 'Mahal';
        else $status = 'Murah';
        return $status;
    }
}

$objekKendaraan1 = new Kendaraan();
$objekKendaraan1->merek="Yamaha MIO"; 
$objekKendaraan1->harga="10000000"; 

$objekKendaraan2 = new Kendaraan();
$objekKendaraan2->merek="Toyota Avanza";
$objekKendaraan2->harga="100000000"; 

echo "Merek: ".$objekKendaraan2->merek;
echo "<br>\n";
echo "Nominal Harga: ".$objekKendaraan2->harga;
echo "<br>\n";
echo "Status Harga Kendaraan: ".$objekKendaraan2->statusHarga()."<br>\n"; 
?>