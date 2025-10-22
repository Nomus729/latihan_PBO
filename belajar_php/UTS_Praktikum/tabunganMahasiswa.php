<?php

class Tabungan
{
    private $nomor;
    private $nama;
    private $saldo;
    private $pin;

    public function __construct($nomor, $nama, $saldo, $pin)
    {
        $this->nomor = (int)$nomor;
        $this->nama = (string)$nama;
        $this->saldo = (int)$saldo;
        $this->pin = (string)$pin;
    }

    public function getNomor()
    {
        return $this->nomor;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

                
    public function cekPin($inputPin)
    {
        return $this->pin === (string)$inputPin;
    }

    public function tambahSaldo($jumlah)
    {
        $jumlah = (int)$jumlah;
        $bonus = $jumlah * 0.05;
        $this->saldo += ($jumlah + $bonus);
        return $bonus;
    }

    public function ambilUang($jumlah)
    {
        $jumlah = (int)$jumlah;

        if ($jumlah > $this->saldo) {
            return false;
        }
        
        
        $this->saldo -= $jumlah;
        return true;
    }
}


function getInput($prompt)
{
    echo $prompt;
    return trim(fgets(STDIN));
}

$daftarNasabah = array(
    1 => new Tabungan(1, "Aditya Hafidz", 500000, "1234"),
    2 => new Tabungan(2, "Eko Nugroho", 1200000, "2222"),
    3 => new Tabungan(3, "Dani Abdul", 750000, "1111"),
);

while (true) {
   

    echo "Jumlah Nasabah Simpanan Pelajar : " . count($daftarNasabah) . "\n";
    echo "\n";
    foreach ($daftarNasabah as $nasabah) {
        echo "Nasabah ke-{$nasabah->getNomor()}: {$nasabah->getNama()} Saldo " . number_format($nasabah->getSaldo()) . "\n";
    }
    echo "----------------------------------------\n";
    
    $pilihanNasabah = getInput("Pilih no nasabah: ");
  
    
    

    if (!array_key_exists($pilihanNasabah, $daftarNasabah)) {
        echo "Pilihan nasabah tidak valid.\n";
        continue;
    }

    $nasabahAktif = $daftarNasabah[$pilihanNasabah];

    $percobaanPin = 0;
    while (true) {
        echo "Nasabah ke: {$nasabahAktif->getNomor()} {$nasabahAktif->getNama()} Saldo " . number_format($nasabahAktif->getSaldo()) . "\n";
        echo "----------------------------------------\n";
        
        $pinInput = getInput("1. Masukan pin ATM: ");

        if ($nasabahAktif->cekPin($pinInput)) {
            echo "Login berhasil!\n";
            break;
        } else {
            echo "Maaf kode pin yang anda masukan tidak sesuai\n";
            echo "Silahkan masukan kembali kode pin yang benar !\n";
            $percobaanPin++;
            if ($percobaanPin >= 3) {
                echo "Anda salah memasukkan PIN 3x.\n";
                break;
            }
        }
    }
    
    if ($percobaanPin >= 3) {
        continue;
    }

    while (true) {
        echo "Nasabah ke: {$nasabahAktif->getNomor()} {$nasabahAktif->getNama()} Saldo " . number_format($nasabahAktif->getSaldo()) . "\n";
        echo "Pilihan Menu:\n";
        echo "1. Tambah saldo\n";
        echo "2. Ambil uang\n";
        echo "----------------------------------------\n";
        
        $pilihanMenu = getInput("Masukan angka pilihan menu: ");

        switch ($pilihanMenu) {
            case '1':
                echo "Pilihan Menu: 1 Tambah Saldo\n";
                $nominal = (int)getInput("Masukan nominal saldo yang akan ditambah: ");
                
                if ($nominal <= 0) {
                    echo "Nominal tidak valid.\n";
                } else {
                    $saldoLama = $nasabahAktif->getSaldo();
                    $bonus = $nasabahAktif->tambahSaldo($nominal);
                    $saldoBaru = $nasabahAktif->getSaldo();
                    
                    echo "Saldo terakhir :\n";
                    echo number_format($saldoLama) . " + " . number_format($nominal) . " + (" . number_format($nominal) . " * 5%) = " . 
                         number_format($saldoLama + $nominal) . " + " . number_format($bonus) . " = " . number_format($saldoBaru) . "\n";
                }
                break;

            case '2':
                echo "Pilihan Menu: 2 Ambil Uang\n";
                $nominal = (int)getInput("Masukan nominal saldo yang akan di ambil: ");

                if ($nominal <= 0) {
                    echo "Nominal tidak valid.\n";
                } else {
                    $saldoLama = $nasabahAktif->getSaldo();
                    
                    if ($nasabahAktif->ambilUang($nominal)) {
                        $saldoBaru = $nasabahAktif->getSaldo();
                        echo "Saldo terakhir:\n";
                        echo number_format($saldoLama) . " - " . number_format($nominal) . " = " . number_format($saldoBaru) . "\n";
                    } else {
                        echo "Jumlah uang yang diambil terlalu melebihi saldo tabungan\n";
                    }
                }
                break;

            default:
                echo "Pilihan menu tidak ada.\n";
                break;
        }

        $kembali = getInput("Kembali ke menu awal : y/n ");
        if (strtolower($kembali) !== 'y') {
            break;
        }
    }
}