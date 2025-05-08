<?php
/**
 * Fungsi untuk menghitung nilai akhir
 * @param float $nilai_uts Nilai UTS
 * @param float $nilai_uas Nilai UAS
 * @param float $nilai_tugas Nilai TUGAS
 * @param float Nilai Akhir
 */
function hitung_nilai($nilai_uts, $nilai_uas, $nilai_tugas){
    define("UTS", 0.25);
    define("UAS", 0.30);
    define("TUGAS", 0.45);
    return 0.25*$nilai_uts + 0.30*$nilai_uas + 0.45*$nilai_tugas;
} 

function kelulusan($nilai_akhir, $batas_nilai = 60){
    if ($nilai_akhir >= $batas_nilai) {
        return "Lulus";
} else {
    return "Tidak Lulus";
}

    }
?>