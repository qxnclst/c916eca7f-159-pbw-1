<?php
// memuat koneksi beserta fungsi-fungsinya
include 'koneksi.php';

// fungsi untuk mengambil data dari form post
function ambilDataFormTambah() {
    return [
        'judul'   => $_POST['judul'],
        'penulis' => $_POST['penulis'],
        'tahun'   => $_POST['tahun'],
        'harga'   => $_POST['harga'],
        'stok'    => $_POST['stok'],
    ];
}

// fungsi untuk menyimpan buku baru ke database
function simpanBukuBaru($koneksi, $data) {
    $stmt = $koneksi->prepare(
        "INSERT INTO buku (judul, penulis, tahun_terbit, harga, stok) VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param(
        "ssidi",
        $data['judul'],
        $data['penulis'],
        $data['tahun'],
        $data['harga'],
        $data['stok']
    );
    $berhasil = $stmt->execute();
    $pesanError = $koneksi->error;
    $stmt->close();

    return ['sukses' => $berhasil, 'error' => $pesanError];
}

// jalankan proses kalau method post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dataBuku = ambilDataFormTambah();
    $hasil = simpanBukuBaru($conn, $dataBuku);

    if ($hasil['sukses']) {
        // redirect ke halaman utama setelah berhasil
        tutupKoneksi($conn);
        arahkanKe("index.php");
    } else {
        echo "error: " . $hasil['error'];
    }

    tutupKoneksi($conn);
}
?>