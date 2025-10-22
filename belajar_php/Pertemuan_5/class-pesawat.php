<?php

require_once 'class-kendaraan.php';

class Pesawat extends Kendaraan {
    private $tinggiMaks;
    private $kecepatanMaks;

    public function setTinggiMaks($tinggi) {
        $this->tinggiMaks = $tinggi;
    }

    public function setKecepatanMaks($kecepatan) {
        $this->kecepatanMaks = $kecepatan;
    }

    public function bacaTinggiMaks() {
        return $this->tinggiMaks;
    }

    public function biayaOperasional() {
        $biaya = 0;
        $hargaPesawat = $this->harga;

        if ($this->tinggiMaks > 5000 && $this->kecepatanMaks > 800) {
            $biaya = 0.30 * $hargaPesawat;
        } elseif (($this->tinggiMaks >= 3000 && $this->tinggiMaks <= 5000) && ($this->kecepatanMaks >= 500 && $this->kecepatanMaks <= 800)) {
            $biaya = 0.20 * $hargaPesawat;
        } elseif ($this->tinggiMaks < 3000 && $this->kecepatanMaks < 500) {
            $biaya = 0.10 * $hargaPesawat;
        } else {
            $biaya = 0.05 * $hargaPesawat;
        }
        return $biaya;
    }
}

$dataPesawat = [
    ['merk' => 'Boeing 737', 'harga' => 2000, 'tinggi' => 7500, 'kecepatan' => 650],
    ['merk' => 'Boeing 747', 'harga' => 3500, 'tinggi' => 5800, 'kecepatan' => 750],
    ['merk' => 'Cassa', 'harga' => 750, 'tinggi' => 3500, 'kecepatan' => 500]
];

echo "<h2>Hasil Perhitungan Biaya Operasional Pesawat</h2>";
echo "<hr>";

foreach ($dataPesawat as $data) {
    $pesawat = new Pesawat($data['merk'], $data['harga']);
    $pesawat->setTinggiMaks($data['tinggi']);
    $pesawat->setKecepatanMaks($data['kecepatan']);
    ///$biaya = $pesawat->biayaOperasional();

    ///echo "<b>Pesawat: {$pesawat->merk}</b><br>\n";
    ///echo "Harga: Rp " . number_format($pesawat->harga*1000000). "<br>\n";
    ///echo "Tinggi Maks: " . number_format($data['tinggi']) . " feet<br>\n";
    ///echo "Kecepatan Maks: " . number_format($data['kecepatan']) . " km/jam<br>\n";
    ///echo "Biaya Operasional: <b>Rp " . number_format($biaya*1000000) . "</b><br>\n";
    ///echo "<hr>\n";
    echo "Biaya operasional pesawat ".$pesawat->merk." dengan harga Rp".number_format($pesawat->harga*1000000)." yang memiliki tinggi<br>\n maksimum ".$pesawat->bacaTinggiMaks()." feet dan kecepatan maksimum ".$data['kecepatan']." KM/Jam adalah Rp".number_format($pesawat->biayaOperasional()*1000000);
    echo "<hr>";
}

?>