<?php

class employee{
    public $gaji;
    public $lamaKerja; //tahunan

    function __construct($gaji,$lamaKerja){
        $this->gaji = $gaji;
        $this->lamaKerja =  $lamaKerja;
    }
    function getGaji(){
        return number_format($this->gaji);
    }
    function getLamaKerja(){
        return $this->lamaKerja;
    }
}

class programmer extends employee{
    function __set($gaji, $lamakerja){
        $this->gaji = $gaji;
        $this->lamaKerja = $lamakerja;
    }
    function hitungBonus(){
        $bonusGaji = 0 ;
        if ($this->lamaKerja >= 1 && $this->lamaKerja<=10){
            $bonusGaji = ($this->gaji*0.01);
            return number_format($bonusGaji);
        }elseif ($this->lamaKerja>10){
            $bonusGaji = ($this->gaji*0.02);
            return number_format($bonusGaji);
        }else{
            return number_format($bonusGaji);
        }
    }
}

class direktur extends employee{
    function __set($gaji, $lamakerja){
        $this->gaji = $gaji;
        $this->lamaKerja = $lamakerja;
    }
    function hitungBonus(){
        $tunjangan = 0.1;
        $bonus = 0.5;
        if ($this->lamaKerja > 10){
            $totalBonus = ($tunjangan*$this->gaji)+($bonus*$this->gaji);
            return $totalBonus; 
        }
    }
}

class pegawaiMingguan extends employee{
    function __set($gaji, $penjualan){
        $this->gaji = $gaji;
        $this->penjualan = $penjualan;
    }
    function setPenjualan($penjualan,$stock,$harga){
        $this->hargaBarang = $harga;
        $this->penjualan = $penjualan;
        $this->stock = $stock;
    }
    function hitungBonus(){
        $bonusGaji = 0; // Sebaiknya inisialisasi dulu

        // Jika penjualan TINGGI (mencapai 70% stok atau lebih)
        if ($this->penjualan >= $this->stock * 0.7){
            // Beri bonus lebih besar, yaitu 10%
            $bonusGaji = (0.1 * $this->hargaBarang) * $this->penjualan;
        } else {
            // Jika penjualan RENDAH, beri bonus lebih kecil, yaitu 3%
            $bonusGaji = (0.03 * $this->hargaBarang) * $this->penjualan;   
        }
        return $bonusGaji;
}
}


$pegawai1 = new programmer(5000000,10);
echo "Nama : Rakan<br>";
echo "Jabatan : Proggrammer";
echo "Gaji : ".$pegawai1->getGaji()."<br>";
echo "Lama Bekerja : ".$pegawai1->getLamaKerja()."<br>";
echo "Bonus yang didapat : ".$pegawai1->hitungBonus()."<br>";


$pegawai2 = new pegawaiMingguan(5000000,5);
$pegawai2->setPenjualan(30,100,10000);
echo "Nama : Kusnaedi<br>";
echo "Jabatan : Pegawai Mingguan";
echo "Gaji : ".$pegawai2->getGaji()."<br>";
echo "Produk yang dijual : ".$pegawai2->penjualan."<br>";
echo "Stock produk : ".$pegawai2->stock."<br>";
echo "Harga Barang : ".$pegawai2->hargaBarang."<br>";
echo "Bonus yang didapat : ".$pegawai2->hitungBonus()."<br>";
?>