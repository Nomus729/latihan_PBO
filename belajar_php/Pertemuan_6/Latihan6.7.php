<?php

class GajiPegawai {
    private $NamaKaryawan;
    private $Golongan;
    private $jamLembur;
    private $GajiPokok = 0;
    private $GajiLembur = 0;
    private $TotalGaji = 0;
    const UPAH_LEMBUR_PER_JAM = 15000;

    public function __construct($Nama, $Golongan, $JamLembur) {
        $this->NamaKaryawan = $Nama;
        $this->Golongan = $Golongan;
        $this->jamLembur = (int)$JamLembur;
    }

    public function getNamaKaryawan() {
        return $this->NamaKaryawan;
    }
    
    public function getGolongan() {
        return $this->Golongan;
    }

    public function getJamLembur() {
        return $this->jamLembur;
    }

    public function getTotalGaji() {
        return "Rp " . number_format($this->TotalGaji, 0, ',', '.');
    }

    private function hitungGajiPokok() {
        $daftarGaji = [
            "Ib" => 1250000, "Ic" => 1300000, "Id" => 1350000, "IIa" => 2000000, 
            "IIb" => 2100000, "IIc" => 2200000, "IId" => 2300000, "IIIa" => 2400000, 
            "IIIb" => 2500000, "IIIc" => 2600000, "IIId" => 2700000, "IVa" => 2800000, 
            "IVb" => 2900000, "IVc" => 3000000, "IVd" => 3100000
        ];
        
        foreach ($daftarGaji as $gol => $gaji) {
            if ($this->Golongan == $gol) {
                $this->GajiPokok = $gaji;
                return;
            }
        }
    }

    private function hitungGajiLembur() {
        $this->GajiLembur = $this->jamLembur * self::UPAH_LEMBUR_PER_JAM;
    }
    
    public function kalkulasiTotalGaji() {
        $this->hitungGajiPokok();
        $this->hitungGajiLembur();
        $this->TotalGaji = $this->GajiPokok + $this->GajiLembur;
    }

    public function __destruct() {
    }
}

echo "Masukkan jumlah karyawan yang ingin diinputkan: ";
$jumlahMasukan = (int)trim(fgets(STDIN));
$semuaPegawai = [];

echo "\nSilakan Masukkan Data Semua Karyawan\n";
for ($i = 1; $i <= $jumlahMasukan; $i++) {
    echo "\n\tData Karyawan ke-" . $i . "\n";
    echo "Masukkan Nama Karyawan: ";
    $nama = trim(fgets(STDIN));
    echo "Masukkan Golongan (Contoh: Ib, IIa, IIIc): ";
    $golongan = trim(fgets(STDIN));
    echo "Masukkan Total Jam Lembur: ";
    $jamLembur = trim(fgets(STDIN));
    $semuaPegawai[] = new GajiPegawai($nama, $golongan, $jamLembur);
}

echo "\n";
echo "\n";
echo "\n";
echo "Nama Karyawan\t"; echo "Golongan\t"; echo "Total Jam Lembur\t"; echo "Total Gaji\n";
echo "==========================================================================\n";
foreach ($semuaPegawai as $index => $pegawai) {
    $pegawai->kalkulasiTotalGaji();
    echo $pegawai->getNamaKaryawan()."\t\t";echo $pegawai->getGolongan()."\t\t";echo $pegawai->getJamLembur()."\t\t\t";echo $pegawai->getTotalGaji()."\n"; 
}



?>