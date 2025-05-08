<?php
class NilaiMahasiswa {
    var $nim;
    var $matkul;
    var $nilai;
public function __construct($nim, $matakuliah, $nilai)
{
    $this->nim = $nim;
    $this->matakuliah = $matakuliah;
    $this->nilai = $nilai;
}
public function getNIM()
{
    return $this->nim;
}
public function getMatakuliah()
        {
            return $this->matakuliah;
        }

        public function getNilai()
        {
            return $this->nilai;
        }

    
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim= $_POST['nim'];
    $matakuliah = $_POST['matakuliah'];
    $nilai = $_POST['nilai'];
   
}
?>