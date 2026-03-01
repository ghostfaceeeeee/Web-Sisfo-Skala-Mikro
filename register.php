<?php
include "koneksi.php";
include "kriptografi.php";

$message = "";
$messageType = "";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = vigenereEncrypt($_POST['password'], $key);
    $email = vigenereEncrypt($_POST['email'], $key);

    $query = "INSERT INTO login (username, password, email)
              VALUES ('$username', '$password', '$email')";

    if (mysqli_query($conn, $query)) {
        $message = "Register berhasil!";
        $messageType = "success";
    } else {
        $message = "Error SQL: " . mysqli_error($conn);
        $messageType = "danger";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body>
    <main class="auth-wrap">
        <section class="card">
            <h2>Register</h2>
            <p class="subtitle">Buat akun baru untuk masuk ke sistem.</p>

            <?php if ($message !== ""): ?>
                <div class="alert alert-<?php echo $messageType; ?>"><?php echo $message; ?></div>
            <?php endif; ?>

            <form method="POST" class="form-grid">
                <div>
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required>
                </div>
                <button type="submit" name="submit">Daftar</button>
            </form>

            <p class="auth-footer">
                <a class="text-link" href="login.php">Sudah punya akun? Login</a>
            </p>
        </section>
    </main>
</body>
</html>
