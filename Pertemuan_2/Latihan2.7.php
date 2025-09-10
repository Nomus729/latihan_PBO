<?php
class Kendaraan
{
    public $jumlahRoda=4;
    public $warna;
    public $bahanBakar="Premium";
    public $harga=100000000;
    public $merek;
    public $tahunPembuatan=2004;

    public function statusHarga()
    {
        if($this->harga > 50000000)
        {
            $status = "Harga Kendaraan Mahal";
        }
        else
        {
            $status = "Harga Kendaraan Murah";
        }
        return $status;
    }

    function statusSubsidi()
    {
        if($this -> tahunPembuatan < 2005 && $this->bahanBakar=="Premium")
        {
            $status = "DAPAT SUBSIDI";
        }
        else
        {
            $status = "TIDAK DAPAT SUBSIDI";
        }
        return $status;
    }
}
//Instansiasi kelas
$ObjekKendaraan = new Kendaraan();//pembuatan objek dari kelas
echo "jumlahRoda : ".$ObjekKendaraan->jumlahRoda."<br />\n"; //proses instansiasi pemanggilan variable
echo "Status Harga : ".$ObjekKendaraan->statusHarga()."<br>\n";//proses instansiasi/pemanggilan function dari kelas
echo "Status Subsidi :".$ObjekKendaraan->statusSubsidi()."<br>\n";
?>