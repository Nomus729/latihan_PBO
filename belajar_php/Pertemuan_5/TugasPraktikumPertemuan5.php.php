<?php
class employee
{
    public $gaji;
    public $lamaKerja;

    function __construct($gaji, $lamaKerja)
    {
        $this->gaji = $gaji;
        $this->lamaKerja = $lamaKerja;
    }

    function getGaji()
    {
        return $this->gaji;
    }

    function getLamaKerja()
    {
        return $this->lamaKerja;
    }
}

class programmer extends employee
{
    function hitungBonus()
    {
        $bonusGaji = 0;
        if ($this->lamaKerja >= 1 && $this->lamaKerja <= 10) {
            $bonusGaji = ($this->gaji * 0.01);
        } elseif ($this->lamaKerja > 10) {
            $bonusGaji = ($this->gaji * 0.02);
        }
        return $bonusGaji;
    }
}

class direktur extends employee
{
    function hitungBonus()
    {
        $totalBonus = 0;
        $tunjangan = 0.1;
        $bonus = 0.5;

        if ($this->lamaKerja > 10) {
            $totalBonus = ($tunjangan * $this->gaji) + ($bonus * $this->gaji);
        }
        return $totalBonus;
    }
}

class pegawaiMingguan extends employee
{
    public $penjualan;
    public $stock;
    public $hargaBarang;

    function __construct($gaji)
    {
        parent::__construct($gaji, 0);
    }

    function setPenjualan($penjualan, $stock, $harga)
    {
        $this->hargaBarang = $harga;
        $this->penjualan = $penjualan;
        $this->stock = $stock;
    }

    function hitungBonus()
    {
        $bonusGaji = 0;
        if ($this->penjualan >= $this->stock * 0.7) {
            $bonusGaji = (0.1 * $this->hargaBarang) * $this->penjualan;
        } else {
            $bonusGaji = (0.03 * $this->hargaBarang) * $this->penjualan;
        }
        return $bonusGaji;
    }
}

$pegawai1 = new programmer(5000000, 10);
echo "Nama : Rakan<br>";
echo "Jabatan : Programmer<br>";
echo "Gaji : " . number_format($pegawai1->getGaji()) . "<br>";
echo "Lama Bekerja : " . $pegawai1->getLamaKerja() . "<br>";
echo "Bonus yang didapat : " . number_format($pegawai1->hitungBonus()) . "<br>";
echo "<hr>";

$pegawai2 = new pegawaiMingguan(5000000);
$pegawai2->setPenjualan(90, 100, 10000);
echo "Nama : Kusnaedi<br>";
echo "Jabatan : Pegawai Mingguan<br>";
echo "Gaji : " . number_format($pegawai2->getGaji()) . "<br>";
echo "Produk yang dijual : " . $pegawai2->penjualan . "<br>";
echo "Stock produk : " . $pegawai2->stock . "<br>";
echo "Harga Barang : " . number_format($pegawai2->hargaBarang) . "<br>";
echo "Bonus yang didapat : " . number_format($pegawai2->hitungBonus()) . "<br>";
echo "<hr>";

$pegawai3 = new direktur(10000000,11);
echo "Nama : Nuryadi<br>";
echo "Jabatan : Direktur<br>";
echo "Gaji : " . number_format($pegawai3->getGaji()) . "<br>";
echo "Lama Bekerja : " . $pegawai3->getLamaKerja() . "<br>";
echo "Bonus yang didapat : " . number_format($pegawai3->hitungBonus()) . "<br>";
echo "<hr>";
?>