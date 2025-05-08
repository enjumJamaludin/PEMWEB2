<?php
function salam($nama = "Nurul Fikri"){
    echo "Assalamualaikum, apa kabar teman-teman!"  . $nama . "!";
}
?>
<h1>SELAMAT DATANG DI STT NF</h1>
<P>
    <?php salam("Zamzammm");
    echo "<br>";
    salam();
?>