<?php

$nama_depan = "Enjum";
$nama_belakang = 'Jamaludin';
$umur = 20;
$tb = 170.5;

echo "Hallo, nama saya $nama_depan $nama_belakang, saya berusia $umur tahun dan tinggi badan saya $tb cm";

// Variabel system
echo 'Dokumen Root' . $_SERVER ['DOCUMENT_ROOT'];

echo "<br /><br />";

// Variabel constanta
define('PHI', 3.14);

$r = 8;
$luas = PHI + $r * $r;

echo "Lingkaran dengan jari-jari {$r}cm memiliki luas {$luas}cm2";

?>