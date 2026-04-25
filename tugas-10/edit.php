<?php
// memuat koneksi dan ambil data berdasarkan id
include 'koneksi.php';

// fungsi untuk mengambil data buku berdasarkan id
function ambilBukuById($koneksi, $id) {
    $stmt = $koneksi->prepare("SELECT * FROM buku WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $hasil = $stmt->get_result();
    $data = $hasil->fetch_assoc();
    $stmt->close();
    return $data;
}

// fungsi untuk membuat field input form
function buatFieldInput($tipe, $nama, $idInput, $label, $nilai = "", $step = "") {
    $stepAttr = ($step !== "") ? " step=\"{$step}\"" : "";
    $html  = "<label for=\"{$idInput}\">{$label}:</label>\n";
    $html .= "<input type=\"{$tipe}\" name=\"{$nama}\" id=\"{$idInput}\"{$stepAttr} value=\"{$nilai}\" required>\n";
    return $html;
}

// ambil data buku yang akan diedit
$idBuku = intval($_GET['id']);
$dataBuku = ambilBukuById($conn, $idBuku);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <!-- halaman form edit buku -->
    <title>edit buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>edit data buku</h2>
        <form action="proses_edit.php" method="post">
            <input type="hidden" name="id" value="<?= $dataBuku['id'] ?>">

            <?= buatFieldInput("text", "judul", "editJudul", "judul", $dataBuku['judul']) ?>
            <?= buatFieldInput("text", "penulis", "editPenulis", "penulis", $dataBuku['penulis']) ?>
            <?= buatFieldInput("number", "tahun", "editTahun", "tahun terbit", $dataBuku['tahun_terbit']) ?>
            <?= buatFieldInput("number", "harga", "editHarga", "harga", $dataBuku['harga'], "0.01") ?>
            <?= buatFieldInput("number", "stok", "editStok", "stok", $dataBuku['stok']) ?>

            <button type="submit">update</button>
        </form>
        <a href="index.php" class="back-link">← kembali</a>
    </div>
</body>
</html>