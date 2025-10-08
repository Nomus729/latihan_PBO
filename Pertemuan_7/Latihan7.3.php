<?php

//class manusia
class manusia{
    //menentukan property dengan protected
    protected $nama = "Ardi";
    var $kelas = "SI 2"; // 'var' sama dengan 'public'

    //method protected
    protected function nama(){
        return "Nama : ".$this->nama;
    }

    public function tampilkan_nama(){
        return $this->nama();
    }

    // DIUBAH DARI PROTECTED MENJADI PUBLIC
    public function tampilkan_kelas(){
        return "Kelas : ".$this->kelas;
    }
    
}

//instansiasi class manusia
$manusia = new manusia();

//memanggil method public dari class manusia
echo $manusia->tampilkan_nama()."<br />";
echo $manusia->tampilkan_kelas(); // Sekarang baris ini tidak akan error

?>