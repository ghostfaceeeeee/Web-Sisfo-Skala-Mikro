<?php
$conn = mysqli_connect("localhost", "root", "", "uts_enkripsi");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>