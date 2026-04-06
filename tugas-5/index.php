<?php
$nama = "";
$nilai = "";
$predikat = "";
$status = "";
$is_submitted = false;

// logic di atas
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $is_submitted = true;
    $nama = htmlspecialchars($_POST["nama"]);
    $nilai = $_POST["nilai"];
    
    if ($nilai >= 85 && $nilai <= 100) {
        $predikat = "A";
        $status = "Lulus";
    } elseif ($nilai >= 75 && $nilai <= 84) {
        $predikat = "B";
        $status = "Lulus";
    } elseif ($nilai >= 65 && $nilai <= 74) {
        $predikat = "C";
        $status = "Lulus";
    } elseif ($nilai >= 50 && $nilai <= 64) {
        $predikat = "D";
        $status = "Tidak Lulus";
    } elseif ($nilai >= 0 && $nilai <= 49) {
        $predikat = "E";
        $status = "Tidak Lulus";
    } else {
        $predikat = "Tidak valid";
        $status = "Tidak valid";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Nilai PHP</title>
    <link rel="stylesheet" href="asdfghjkl.css">
</head>
<body>

<div class="container">
    <h2>cek nilai</h2>
    
    <form method="post" action="">
        Nama: <input type="text" name="nama" required value="<?php echo htmlspecialchars($nama); ?>"><br>
        Nilai: <input type="number" name="nilai" required value="<?php echo htmlspecialchars($nilai); ?>"><br>
        <input type="submit" value="Proses">
    </form>

    <?php 
    if ($is_submitted): 
    ?>
        <div class='hasil'>
            <p>nama : <span><?php echo $nama; ?></span></p>
            <p>nilai : <span><?php echo $nilai; ?></span></p>
            <p>predikat : <span><?php echo $predikat; ?></span></p>
            <p>status : <span><?php echo $status; ?></span></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>