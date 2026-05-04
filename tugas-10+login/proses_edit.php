<?php
// memuat koneksi beserta fungsi-fungsinya
include 'koneksi.php';

// fungsi untuk mengambil data dari form edit
function ambilDataFormEdit() {
    return [
        'id'      => $_POST['id'],
        'judul'   => $_POST['judul'],
        'penulis' => $_POST['penulis'],
        'tahun'   => $_POST['tahun'],
        'harga'   => $_POST['harga'],
        'stok'    => $_POST['stok'],
    ];
}

// fungsi untuk mengupdate data buku di database
function updateDataBuku($koneksi, $data) {
    $stmt = $koneksi->prepare(
        "UPDATE buku SET judul=?, penulis=?, tahun_terbit=?, harga=?, stok=? WHERE id=?"
    );
    $stmt->bind_param(
        "ssidii",
        $data['judul'],
        $data['penulis'],
        $data['tahun'],
        $data['harga'],
        $data['stok'],
        $data['id']
    );
    $berhasil = $stmt->execute();
    $pesanError = $koneksi->error;
    $stmt->close();

    return ['sukses' => $berhasil, 'error' => $pesanError];
}

// jalankan proses kalau method post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dataBuku = ambilDataFormEdit();
    $hasil = updateDataBuku($conn, $dataBuku);

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