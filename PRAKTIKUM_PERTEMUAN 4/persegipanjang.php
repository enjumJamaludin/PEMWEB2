<?php
class Persegipanjang{
    public $panjang;
    public $lebar;

    public function __construct($panjang, $lebar)
    {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function hitungLuas(){
        return $this->panjang * $this->lebar;
    }

    public function HitungKeliling(){
        return 2 * ($this->panjang + $this->lebar);
    }
}

$persegi1 = new Persegipanjang(5, 6);
echo "Luas Persegi Panjang" .$persegi1->HitungLuas() . "<br>";
echo "Keliling Persegi Panjang" .$persegi1->HitungKeliling() . "<br>";


?>