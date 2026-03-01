<?php
include "koneksi.php";
include "kriptografi.php";
session_start();

$message = "";
$messageType = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password_input = $_POST['password'];

    $query = "SELECT * FROM login WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        $data = mysqli_fetch_assoc($result);
        $password_db = vigenereDecrypt($data['password'], $key);

        if ($password_input == $password_db) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        }

        $message = "Password salah!";
        $messageType = "danger";

    } else {
        $message = "Username tidak ditemukan!";
        $messageType = "danger";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="ui.css">
</head>
<body>
    <main class="auth-wrap">
        <section class="card">
            <h2>Login</h2>
            <p class="subtitle">Masuk untuk mengakses dashboard.</p>

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
                <button type="submit" name="login">Login</button>
            </form>

            <p class="auth-footer">
                <a class="text-link" href="register.php">Belum punya akun? Register</a>
            </p>
        </section>
    </main>
</body>
</html>
