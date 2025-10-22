<?php

abstract class Tabungan
{
    protected $saldo;

    public function __construct(float $saldoAwal)
    {
        $this->saldo = $saldoAwal;
    }

    public function getSaldo(): string
    {
        return "Rp " . number_format($this->saldo, 2, ',', '.');
    }

    public function setorTunai(float $jumlah): void
    {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
            echo "Setor tunai sebesar " . number_format($jumlah) . " berhasil.\n";
        } else {
            echo "Jumlah setor harus lebih dari nol.\n";
        }
    }

    public function tarikTunai(float $jumlah): bool
    {
        if ($jumlah <= 0) {
            echo "Jumlah penarikan harus lebih dari nol.\n";
            return false;
        }

        if ($this->saldo >= $jumlah) {
            $this->saldo -= $jumlah;
            echo "Tarik tunai sebesar " . number_format($jumlah) . " berhasil.\n";
            return true;
        } else {
            echo "Transaksi Gagal! Saldo Anda tidak mencukupi.\n";
            return false;
        }
    }

    abstract protected function getInfoSiswa(): string;
}

class Siswa extends Tabungan
{
    private $nama;
    private $nis;

    public function __construct(string $nis, string $nama, float $saldoAwal)
    {
        $this->nis = $nis;
        $this->nama = $nama;
        parent::__construct($saldoAwal);
    }

    public function getNIS(): string
    {
        return $this->nis;
    }

    public function getInfoSiswa(): string
    {
        return "NIS: " . $this->nis . "\n" .
               "Nama: " . $this->nama . "\n" .
               "Saldo Saat Ini: " . $this->getSaldo() . "\n";
    }
}

$daftarSiswa = [
    new Siswa("1001", "Budi Sanjaya", 50000),
    new Siswa("1002", "Citra Lestari", 75000),
    new Siswa("1003", "Doni Firmansyah", 120000),
];

function cariSiswa(array $daftarSiswa, string $nis): ?Siswa
{
    foreach ($daftarSiswa as $siswa) {
        if ($siswa->getNIS() === $nis) {
            return $siswa;
        }
    }
    return null;
}

echo "========================================\n";
echo "Selamat Datang di Program Tabungan Sekolah\n";
echo "========================================\n";

while (true) {
    echo "\n--- MENU UTAMA ---\n";
    echo "1. Tampilkan Saldo Semua Siswa\n";
    echo "2. Setor Tunai\n";
    echo "3. Tarik Tunai\n";
    echo "4. Keluar\n";
    echo "Pilih menu (1-4): ";

    $pilihan = trim(fgets(STDIN));

    switch ($pilihan) {
        case '1':
            echo "\n--- SALDO SEMUA SISWA ---\n";
            foreach ($daftarSiswa as $siswa) {
                echo $siswa->getInfoSiswa() . "\n";
            }
            break;

        case '2':
            echo "\n--- SETOR TUNAI ---\n";
            echo "Masukkan NIS siswa: ";
            $nis = trim(fgets(STDIN));
            $siswa = cariSiswa($daftarSiswa, $nis);

            if ($siswa) {
                echo "Masukkan jumlah setor: ";
                $jumlah = (float)trim(fgets(STDIN));
                $siswa->setorTunai($jumlah);
                echo "\nSaldo terbaru:\n";
                echo $siswa->getInfoSiswa();
            } else {
                echo "Siswa dengan NIS '$nis' tidak ditemukan.\n";
            }
            break;

        case '3':
            echo "\n--- TARIK TUNAI ---\n";
            echo "Masukkan NIS siswa: ";
            $nis = trim(fgets(STDIN));
            $siswa = cariSiswa($daftarSiswa, $nis);

            if ($siswa) {
                echo "Masukkan jumlah penarikan: ";
                $jumlah = (float)trim(fgets(STDIN));
                $siswa->tarikTunai($jumlah);
                echo "\nSaldo terbaru:\n";
                echo $siswa->getInfoSiswa();
            } else {
                echo "Siswa dengan NIS '$nis' tidak ditemukan.\n";
            }
            break;

        case '4':
            echo "Terima kasih telah menggunakan program ini.\n";
            exit;

        default:
            echo "Pilihan tidak valid. Silakan coba lagi.\n";
            break;
    }
}
?>