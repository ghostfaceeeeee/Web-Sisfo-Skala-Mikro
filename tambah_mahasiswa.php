<?php
include "koneksi.php";
include "kriptografi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$message = "";
$messageType = "";

if (isset($_POST['submit'])) {

    $nim = $_POST['nim'];
    $nama = vigenereEncrypt($_POST['nama'], $key);
    $alamat = vigenereEncrypt($_POST['alamat'], $key);
    $jurusan = $_POST['jurusan'];

    $query = "INSERT INTO mahasiswa (nim, nama, alamat, jurusan)
              VALUES ('$nim', '$nama', '$alamat', '$jurusan')";

    if (mysqli_query($conn, $query)) {
        $message = "Data mahasiswa berhasil ditambahkan!";
        $messageType = "success";
    } else {
        $message = "Error: " . mysqli_error($conn);
        $messageType = "danger";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body>
    <main class="page">
        <section class="card">
            <h2>Tambah Mahasiswa</h2>
            <p class="subtitle">Isi data berikut untuk menambahkan mahasiswa baru.</p>

            <?php if ($message !== ""): ?>
                <div class="alert alert-<?php echo $messageType; ?>"><?php echo $message; ?></div>
            <?php endif; ?>

            <form method="POST" class="form-grid">
                <div>
                    <label for="nim">NIM</label>
                    <input id="nim" type="text" name="nim" required>
                </div>
                <div>
                    <label for="nama">Nama</label>
                    <input id="nama" type="text" name="nama" required>
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input id="alamat" type="text" name="alamat" required>
                </div>
                <div>
                    <label for="jurusan">Jurusan</label>
                    <input id="jurusan" type="text" name="jurusan" required>
                </div>
                <button type="submit" name="submit">Tambah</button>
            </form>

            <div class="actions">
                <a class="btn btn-secondary" href="dashboard.php">Kembali ke Dashboard</a>
            </div>
        </section>
    </main>
</body>
</html>
