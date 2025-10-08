<?php

class Komputer
{
    // Properti ini private, hanya bisa diakses oleh method di dalam class Komputer ini saja.
    private $jenisProcessor = "Intel Core i7-4790 3.60Ghz";

    // Properti ini protected, bisa diakses oleh class ini dan class turunannya (Laptop).
    protected $jenisRAM = "DDR 4";

    // Properti ini public, bisa diakses dari mana saja.
    public $jenisVGA = "PCI Express";

    /**
     * Method public untuk "jembatan" mengakses properti private $jenisProcessor.
     * Ini adalah cara yang benar untuk memberikan akses ke data private.
     */
    public function getProcessor()
    {
        return $this->jenisProcessor;
    }

    /**
     * Method public untuk mengakses properti public $jenisVGA.
     */
    public function getVGA()
    {
        return $this->jenisVGA;
    }
}


/**
 * Child Class: Laptop
 * Mewarisi semua properti dan method public/protected dari Komputer.
 */
class Laptop extends Komputer
{
    /**
     * Method ini bisa mengakses properti protected $jenisRAM dari parent class.
     */
    public function getRAM()
    {
        return $this->jenisRAM;
    }
}


// --- EKSEKUSI KODE ---

// Instansiasi objek
$komputer = new Komputer();
$laptop = new Laptop();

echo "<h3>Info Objek Komputer:</h3>";
// Mengambil data prosesor melalui method public getProcessor()
echo "Processor: " . $komputer->getProcessor() . "<br />";
// Mengambil data VGA langsung dari properti public
echo "VGA: " . $komputer->jenisVGA . "<br />";


echo "<h3>Info Objek Laptop (Mewarisi dari Komputer):</h3>";
// Laptop memanggil method public getProcessor() yang diwarisi dari Komputer
echo "Processor: " . $laptop->getProcessor() . "<br />";
// Laptop memanggil method getRAM() miliknya sendiri untuk mengakses properti protected dari Komputer
echo "RAM: " . $laptop->getRAM() . "<br />";
// Laptop mengakses properti public jenisVGA yang diwarisi dari Komputer
echo "VGA: " . $laptop->jenisVGA . "<br />";

?>