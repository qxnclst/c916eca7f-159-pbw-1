<?php
// fungsi untuk membuat field input form tambah
function buatFieldTambah($tipe, $nama, $idInput, $label, $step = "") {
    $stepAttr = ($step !== "") ? " step=\"{$step}\"" : "";
    $html  = "<label for=\"{$idInput}\">{$label}:</label>\n";
    $html .= "<input type=\"{$tipe}\" name=\"{$nama}\" id=\"{$idInput}\"{$stepAttr} required>\n";
    return $html;
}

// fungsi untuk merender seluruh form tambah
function renderFormTambah() {
    $form  = buatFieldTambah("text", "judul", "inputJudul", "judul");
    $form .= buatFieldTambah("text", "penulis", "inputPenulis", "penulis");
    $form .= buatFieldTambah("number", "tahun", "inputTahun", "tahun terbit");
    $form .= buatFieldTambah("number", "harga", "inputHarga", "harga", "0.01");
    $form .= buatFieldTambah("number", "stok", "inputStok", "stok");
    return $form;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <!-- halaman form tambah buku -->
    <title>tambah buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>tambah data buku</h2>
        <form action="proses_tambah.php" method="post">
            <?= renderFormTambah() ?>
            <button type="submit">simpan</button>
        </form>
        <a href="index.php" class="back-link">← kembali</a>
    </div>
</body>
</html>