<?php
include "kriptografi.php";

$asli = "2410651083";
$enkripsi = vigenereEncrypt($asli, $key);
$dekripsi = vigenereDecrypt($enkripsi, $key);

echo "Asli: $asli <br>";
echo "Enkripsi: $enkripsi <br>";
echo "Dekripsi: $dekripsi <br>";
?>