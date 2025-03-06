<?php

$_nama = $_POST['nama'];
$_matkul  = $_POST['matkul'];
$_nilai_uts = $_POST['nilai_uts'];
$_nilai_uas = $_POST['nilai_uas'];
$_tugas_praktikum= $_POST['tugas_praktikum'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Input Data</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<h3>HASIL INPUT DATA</h3>
Nama Mahasiswa: <?php echo $_nama; ?></br>
Matkul: <?php echo $_matkul; ?></br>
Nilai UTS: <?php echo $_nilai_uts; ?></br>
Nilai UAS: <?php echo $_nilai_uas; ?></br>
Tugas Praktikum: <?php echo $_tugas_praktikum; ?></br>

<?php
$nilai_total = ($_nilai_uts * 0.3) + ($_nilai_uas * 0.35) + ($_tugas_praktikum * 0.35);

// Cek nilai total 
if ($nilai_total > 55) {
    echo "<h1> Selamat Enjum kamu lulus.</h1>";
} else {
    echo "<h1>Ah bego lu ga lulus.</h1>";
}

// Menentukan grade berdasarkan nilai total
if ($nilai_total < 0 || $nilai_total > 100) {
  $grade = 'I'; 
} elseif ($nilai_total <= 35) {
  $grade = 'E'; 
} elseif ($nilai_total <= 55) {
  $grade = 'D'; 
} elseif ($nilai_total <= 69) {
  $grade = 'C'; 
} elseif ($nilai_total <= 84) {
  $grade = 'B';
} else {
  $grade = 'A';
}

// Menampilkan grade
switch ($grade) {
  case 'A':
      echo "<p class='grade'>Grade: A - Sangat Memuaskan</p>";
      break;
  case 'B':
      echo "<p class='grade'>Grade: B - Memuaskan</p>";
      break;
  case 'C':
      echo "<p class='grade'>Grade: C - Cukup</p>";
      break;
  case 'D':
      echo "<p class='grade'>Grade: D - Kurang</p>";
      break;
  case 'E':
      echo "<p class='grade'>Grade: E - Sangat Kurang</p>";
      break;
  case 'I':
      echo "<p class='grade'>Grade: I - Tidak Ada</p>";
      break;
  default:
      echo "<p class='grade'>Nilai tidak valid.</p>";
      break;
}

// Menambahkan tabel predikat nilai siswa
echo "<h3>Tabel Predikat Nilai Siswa</h3>";
echo "<table>";
echo "<tr><th>Grade</th><th>Predikat</th></tr>";

echo "<tr><td>A</td><td>Sangat Memuaskan</td></tr>";
echo "<tr><td>B</td><td>Memuaskan</td></tr>";
echo "<tr><td>C</td><td>Cukup</td></tr>";
echo "<tr><td>D</td><td>Kurang</td></tr>";
echo "<tr><td>E</td><td>Sangat Kurang</td></tr>";
echo "<tr><td>I</td><td>Tiada</td></tr>";

echo "</table>";

?>
</body>
</html>
