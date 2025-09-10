<?php

// Inisialisasi data kendaraan dalam bentuk array
$Data1 = array('Toyota Yaris', '4', '160000000', 'Merah', 'Pertamax', '2014');
$Data2 = array('Honda Scoopy', '2', '13000000', 'Putih', 'Premium', '2005');
$Data3 = array('Isuzu Panther', '4', '40000000', 'Hitam', 'Solar', '1994');

// Loop untuk membuat dan mengisi properti objek Kendaraan
// Catatan: Loop 'for' bagian dalam ($h) tampaknya tidak perlu dan menyebabkan
// data yang sama di-set berulang kali ke objek.
for ($i = 1; $i <= 3; $i++) {
    for ($h = 0; $h <= 5; $h++) {
        // Membuat objek baru dari kelas Kendaraan
        ${"kendaraan$i"} = new Kendaraan();
        
        // Mengatur properti objek menggunakan data dari array
        ${"kendaraan$i"}->setMerek(${"Data$i"}[0]);
        ${"kendaraan$i"}->setJmlRoda(${"Data$i"}[1]);
        ${"kendaraan$i"}->setHarga(${"Data$i"}[2]);
        ${"kendaraan$i"}->setWarna(${"Data$i"}[3]);
        ${"kendaraan$i"}->setBhnBakar(${"Data$i"}[4]);
        ${"kendaraan$i"}->setTahun(${"Data$i"}[5]);
    }
}

// Loop untuk menampilkan detail dari setiap objek Kendaraan
for ($i = 1; $i <= 3; $i++) {
    echo "\Kendaraan$i<br>"
        . ${"kendaraan$i"}->getMerek() . "<br>"
        . ${"kendaraan$i"}->getJmlRoda() . "<br>"
        . ${"kendaraan$i"}->getHarga() . "<br>"
        . ${"kendaraan$i"}->getWarna() . "<br>"
        . ${"kendaraan$i"}->getBhnBakar() . "<br>"
        . ${"kendaraan$i"}->getTahun() . "<br>"
        . ${"kendaraan$i"}->statusHarga() . "<br>"
        . ${"kendaraan$i"}->dapatSubsidi() . "<br>"
        . ${"kendaraan$i"}->hargaSecondKendaraan() . "<br><br>";
}

?>