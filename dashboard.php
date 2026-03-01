<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body>
    <main class="page">
        <section class="card">
            <h2>Dashboard</h2>
            <p class="subtitle">Selamat datang, <strong><?php echo $_SESSION['username']; ?></strong>.</p>

            <div class="grid-links">
                <a class="link-card" href="tambah_mahasiswa.php">Tambah Mahasiswa</a>
                <a class="link-card" href="cari_mahasiswa.php">Cari Mahasiswa</a>
            </div>

            <div class="actions">
                <a class="btn btn-secondary" href="logout.php">Logout</a>
            </div>
        </section>
    </main>
</body>
</html>
