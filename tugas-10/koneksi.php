<?php
// fungsi untuk membuat koneksi ke database
function buatKoneksi() {
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "pemrograman_web_contoh";

    $koneksi = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    // hentikan kalau koneksi gagal
    if ($koneksi->connect_error) {
        die("koneksi gagal: " . $koneksi->connect_error);
    }

    return $koneksi;
}

// fungsi untuk menjalankan query dan mengembalikan hasilnya
function jalankanQuery($koneksi, $sql) {
    $hasil = $koneksi->query($sql);
    return $hasil;
}

// fungsi untuk menutup koneksi dengan aman
function tutupKoneksi($koneksi) {
    $koneksi->close();
}

// fungsi redirect ke halaman lain
function arahkanKe($halaman) {
    header("Location: " . $halaman);
    exit;
}

// buat koneksi saat file ini di-include
$conn = buatKoneksi();
?>