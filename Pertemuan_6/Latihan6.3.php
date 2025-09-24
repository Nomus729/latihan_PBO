<?php
echo "<h1>Konversi Suhu dari Celcius</h1>";

if (isset($_GET['celcius']) && is_numeric($_GET['celcius'])) {

    $nilaiCelcius = (float) $_GET['celcius'];

    class KonverterSuhu {
        private $celcius;

        
        public function __construct(float $suhuAwal) {
            $this->celcius = $suhuAwal;
            echo "suhu dalam celcius = " . $this->celcius . " derajat\n <br>";
        }

        
        public function prosesKonversi() {
            $skalaTujuan = ["kelvin", "fahrenheit", "reamur"];

            foreach ($skalaTujuan as $skala) {
                if ($skala === "kelvin") {
                    $hasil = $this->celcius + 273.15;
                    echo "<br>";
                    echo "<strong>suhu dalam kelvin = " . $hasil . " derajat</strong>\n<br>";
                } elseif ($skala === "fahrenheit") {
                    $hasil = ($this->celcius * 9/5) + 32;
                    echo "<br>";
                    echo "<strong>suhu dalam fahrenheit = " . $hasil . " derajat\n<br></strong>";
                    echo "<br>";
                }
            }
            echo "\nSekian konfersi suhu yang bisa dilakukan<br>";
        }
    }

    $konverter = new KonverterSuhu($nilaiCelcius);
    $konverter->prosesKonversi();

} 
?>