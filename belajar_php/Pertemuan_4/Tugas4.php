<?php
//header('Content-Type: text/plain');

class BangunRuang {
    private $jenis;
    private $sisi;
    private $jariJari;
    private $tinggi;

    function setProperties($jenis, $sisi, $jariJari, $tinggi) {
        $this->jenis = $jenis;
        $this->sisi = $sisi;
        $this->jariJari = $jariJari;
        $this->tinggi = $tinggi;
    }

    function hitungVolume() {
        $volume = 0;
        switch ($this->jenis) {
            case 'Bola':
                $volume = (4/3) * M_PI * pow($this->jariJari, 3);
                break;
            case 'Kerucut':
                $volume = (1/3) * M_PI * pow($this->jariJari, 2) * $this->tinggi;
                break;
            case 'Limas Segi Empat':
                $volume = (1/3) * pow($this->sisi, 2) * $this->tinggi;
                break;
            case 'Kubus':
                $volume = pow($this->sisi, 3);
                break;
            case 'Tabung':
                $volume = M_PI * pow($this->jariJari, 2) * $this->tinggi;
                break;
        }
        return $volume;
    }
}

$dataBangunRuang = [
    ['jenis' => 'Bola', 'sisi' => 0, 'jari-jari' => 7, 'tinggi' => 0],
    ['jenis' => 'Kerucut', 'sisi' => 0, 'jari-jari' => 14, 'tinggi' => 10],
    ['jenis' => 'Limas Segi Empat', 'sisi' => 8, 'jari-jari' => 0, 'tinggi' => 24],
    ['jenis' => 'Kubus', 'sisi' => 30, 'jari-jari' => 0, 'tinggi' => 0],
    ['jenis' => 'Tabung', 'sisi' => 0, 'jari-jari' => 7, 'tinggi' => 10]
];

echo "<pre>";

$judul = str_pad("Jenis Bangun Ruang", 23).str_pad("Sisi", 10) .
          str_pad("Jari-jari", 15) .
          str_pad("Tinggi", 15) .
          str_pad("Volume", 20);

echo $judul."\n";
echo str_repeat("~", 100)."\n";

for ($i=0;$i<count($dataBangunRuang);$i++) {
    $data = $dataBangunRuang[$i];
    $bangun = new BangunRuang();
    $bangun->setProperties($data['jenis'], $data['sisi'], $data['jari-jari'], $data['tinggi']);
    $volume = $bangun->hitungVolume();
    $baris = str_pad($data['jenis'], 25).str_pad($data['sisi'], 10).str_pad($data['jari-jari'], 15).str_pad($data['tinggi'], 10).str_pad($volume, 20);

    echo $baris . "\n";
}

?>