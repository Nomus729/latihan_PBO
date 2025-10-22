<?php

class GajiPegawai{
    public $Gaji;
    public $Golongan;
    public $NamaKaryawan;
    public $jamLembur;

    function __construct($Nama,$Golongan,$JamLembur){
        $this->NamaKaryawan = $Nama;
        $this->Golongan = $Golongan;
        $this->jamLembur = $JamLembur;
    }
    function setGajiPokok($golongan){
    
        $daftarGaji = [
            ["Ib" => 125000],["Ic"=>1300000],["Id"=>1350000],["IIa"=>2000000],["IIb"=>2100000],["IIc"=>2200000],
            ["IId"=>2300000],["IIIa"=>2400000],["IIIb"=>2500000],["IIIc"=>2600000],["IIId"=>2700000],
            ["Iva"=>2800000],["Ivb"=>2900000],["Ivc"=>3000000],["Ivd"=>3100000]
        ];
        for ($i=0;$i==count($daftarGaji);$i++){
            $data = $daftarGaji[$i];
            if ($data==$golongan){
                $this->Gaji = $data;
            }
        }
    }
}


?>