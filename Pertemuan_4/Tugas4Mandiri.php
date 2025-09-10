<?php

class PolaSegitiga
{
    private int $tinggi;

    public function __construct(int $tinggi = 5)
    {
        $this->tinggi = $tinggi;
    }

    public function setTinggi(int $newTinggi): void
    {
        if ($newTinggi > 0) {
            $this->tinggi = $newTinggi;
        }
    }

    public function getTinggi(): int
    {
        return $this->tinggi;
    }

    public function buatPolaSatu(): void
    {
        for ($i = 1; $i <= $this->tinggi; $i++) {
            for ($j = $i; $j < $this->tinggi; $j++) {
                echo "&nbsp;&nbsp;";
            }
            for ($k = 1; $k <= (2 * $i - 1); $k++) {
                echo "*";
            }
            echo "<br>";
        }
    }

    public function buatPolaDua(): void
    {
        for ($i = 1; $i <= $this->tinggi; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo "*";
            }
            echo "<br>";
        }
        for ($i = $this->tinggi - 1; $i >= 1; $i--) {
            for ($j = 1; $j <= $i; $j++) {
                echo "*";
            }
            echo "<br>";
        }
    }

    public function buatPolaTiga(): void
    {
        for ($i = 1; $i <= $this->tinggi; $i++) {
            for ($j = $i; $j < $this->tinggi; $j++) {
                echo "&nbsp;&nbsp;";
            }
            for ($k = 1; $k <= $i; $k++) {
                echo "*";
            }
            echo "<br>";
        }
        for ($i = $this->tinggi - 1; $i >= 1; $i--) {
            for ($j = $i; $j < $this->tinggi; $j++) {
                echo "&nbsp;&nbsp;";
            }
            for ($k = 1; $k <= $i; $k++) {
                echo "*";
            }
            echo "<br>";
        }
    }
}

echo "<pre>";

$generatorPola = new PolaSegitiga(5);

$daftarPola = [
    'buatPolaSatu',
    'buatPolaDua',
    'buatPolaTiga'
];

foreach ($daftarPola as $metode) {
    $generatorPola->$metode();
    echo "<hr>";
}

?>