<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <!-- halaman form login -->
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>masuk kedalam sistem</h2>
        <?php if (isset($_GET['message'])): ?>
            <div class="alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
        <?php endif; ?>
        <form method="post" action="proses_login.php">
            <label for="inputNama">nama pengguna :</label>
            <input type="text" name="username" id="inputNama" class="form-control" required>

            <label for="inputSandi">kata sandi :</label>
            <input type="password" name="password" id="inputSandi" class="form-control" required>

            <button type="submit">login</button>
        </form>
    </div>
</body>
</html>
