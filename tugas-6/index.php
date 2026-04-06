<?php
// Inisialisasi variabel
$npm = "";
$nama = "";
$prodi = "";
$semester = "";
$biaya_ukt = "";
$diskon_persen = 0;
$total_bayar = 0;
$is_submitted = false;

// logic diatas (just liek tugas 5)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $is_submitted = true;
    
    $npm = htmlspecialchars($_POST["npm"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $prodi = htmlspecialchars($_POST["prodi"]);
    $semester = (int)$_POST["semester"];
    $biaya_ukt = (float)$_POST["biaya_ukt"];
    
    if ($biaya_ukt >= 5000000) {
        if ($semester > 8) {
            $diskon_persen = 15;
        } else {
            $diskon_persen = 10;
        }
    } else {
        $diskon_persen = 0;
    }
    
    // Menghitung total yang harus dibayar
    $potongan = ($diskon_persen / 100) * $biaya_ukt;
    $total_bayar = $biaya_ukt - $potongan;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskon UKT Mahasiswa</title>
    <link rel="stylesheet" href="aaaaaaaaa.css">
</head>
<body>

<div class="container">
    <h2>Pembayaran UKT</h2>
    
    <form method="post" action="">
        NPM: <input type="text" name="npm" required value="<?php echo htmlspecialchars($npm); ?>"><br>
        Nama: <input type="text" name="nama" required value="<?php echo htmlspecialchars($nama); ?>"><br>
        Prodi: <input type="text" name="prodi" required value="<?php echo htmlspecialchars($prodi); ?>"><br>
        Semester: <input type="number" name="semester" required value="<?php echo htmlspecialchars($semester); ?>"><br>
        Biaya UKT (Rp): <input type="number" name="biaya_ukt" required value="<?php echo htmlspecialchars($biaya_ukt); ?>"><br>
        <input type="submit" value="Hitung Diskon">
    </form>

    <?php 
    if ($is_submitted): 
    ?>
        <div class='hasil'>
            <p>NPM : <span><?php echo $npm; ?></span></p>
            <p>NAMA : <span><?php echo strtoupper($nama); ?></span></p>
            <p>PRODI : <span><?php echo strtoupper($prodi); ?></span></p>
            <p>SEMESTER : <span><?php echo $semester; ?></span></p>
            <p>BIAYA UKT : <span>Rp. <?php echo number_format($biaya_ukt, 0, ',', '.'); ?>,-</span></p>
            <p>DISKON : <span><?php echo $diskon_persen; ?>%</span></p>
            <p>YANG HARUS DIBAYAR: <span>Rp. <?php echo number_format($total_bayar, 0, ',', '.'); ?>,-</span></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>