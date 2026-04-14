<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bab 8</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>bab 8</h2>
    
    <div class="nav-links">
        <a href="menu.php?page=soal1">soal 1</a>
        <a href="menu.php?page=soal2">soal 2</a>
        <a href="menu.php?page=soal3">soal 3</a>
        <a href="menu.php?page=soal4">soal 4</a>
    </div>

    <div class="content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            
            if (file_exists($page . '.php')) {
                include $page . '.php';
            } else {
                echo "<p style='justify-content: center;'>page not found</p>";
            }
        } else {
            echo "<p style='justify-content: center;'>pilih soal di atas</p>";
        }
        ?>

    </div>
</div>

</body>
</html>