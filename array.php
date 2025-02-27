<?php  

$list_buah = ["Pepaya", "Mangga", "Pisang", "Jambu"];

/**
 * Nilai di dalam array masing-masing memiliki sebuah kunci yang di sebut dengan index
 * 
 * index dimulai dari 0
 */

echo $list_buah[2];
echo "<br>List berisi " . count($list_buah) . "buah";

//mencetak seluruh nilai  di dalam array

echo "<ol>";
foreach($list_buah as $buah ) {
    echo "<li>$buah</li>";
}
echo "</ol>";

//menambahkan nilai array baru 

$list_buah [] = "Durian";
echo "<ol>";
foreach($list_buah as $buah) {
    echo "<li>$buah</li>";
}
echo "</ol>";

//menghapus nilai array berdasarkan nilai index

unset ($list_buah[2]);
echo "<ol>";
foreach ($list_buah as $buah);{
    echo "<li>$buah</li>";
}
echo "</ol>";

//mennngubah nilai array berdasarkan index

$list_buah[0] = "Nanas";
echo "<ol>";
foreach ($list_buah as $buah);{
    echo "<li>$buah</li>";
}
echo "</ol>";

//mencetak seluruh array berdasarkan indexnya
echo "<ul>";
foreach($list_buah as $index => $buah) {
    echo "<li>Buah dengan indexnya $index adalah $buah</li>";
}
echo "</ul>";

?>
