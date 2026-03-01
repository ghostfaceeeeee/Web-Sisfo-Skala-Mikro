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
$resultData = null;

if (isset($_POST['cari'])) {

    $nim = $_POST['nim'];

    $query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        $data = mysqli_fetch_assoc($result);
        $resultData = [
            'nim' => $data['nim'],
            'nama' => vigenereDecrypt($data['nama'], $key),
            'alamat' => vigenereDecrypt($data['alamat'], $key),
            'jurusan' => $data['jurusan']
        ];

    } else {
        $message = "Data tidak ditemukan!";
        $messageType = "danger";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Mahasiswa</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body>
    <main class="page">
        <section class="card">
            <h2>Cari Mahasiswa</h2>
            <p class="subtitle">Cari data mahasiswa berdasarkan NIM.</p>

            <?php if ($message !== ""): ?>
                <div class="alert alert-<?php echo $messageType; ?>"><?php echo $message; ?></div>
            <?php endif; ?>

            <form method="POST" class="form-grid">
                <div>
                    <label for="nim">Masukkan NIM</label>
                    <input id="nim" type="text" name="nim" required>
                </div>
                <button type="submit" name="cari">Cari</button>
            </form>

            <?php if ($resultData): ?>
                <h3 style="margin-top:22px;">Data Mahasiswa</h3>
                <ul class="result-list">
                    <li><strong>NIM:</strong> <?php echo $resultData['nim']; ?></li>
                    <li><strong>Nama:</strong> <?php echo $resultData['nama']; ?></li>
                    <li><strong>Alamat:</strong> <?php echo $resultData['alamat']; ?></li>
                    <li><strong>Jurusan:</strong> <?php echo $resultData['jurusan']; ?></li>
                </ul>
            <?php endif; ?>

            <div class="actions">
                <a class="btn btn-secondary" href="dashboard.php">Kembali ke Dashboard</a>
            </div>
        </section>
    </main>
</body>
</html>
