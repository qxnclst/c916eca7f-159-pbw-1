<?php
// memuat koneksi beserta fungsi-fungsinya
include 'koneksi.php';

// fungsi untuk menghapus buku berdasarkan id
function hapusBukuById($koneksi, $id) {
    $stmt = $koneksi->prepare("DELETE FROM buku WHERE id = ?");
    $stmt->bind_param("i", $id);
    $berhasil = $stmt->execute();
    $pesanError = $koneksi->error;
    $stmt->close();

    // kembalikan status dan pesan error jika ada
    return ['sukses' => $berhasil, 'error' => $pesanError];
}

// proses hapus kalau ada parameter id
if (isset($_GET['id'])) {
    $idHapus = intval($_GET['id']);
    $hasil = hapusBukuById($conn, $idHapus);

    if ($hasil['sukses']) {
        // kalau berhasil, balik ke halaman utama
        tutupKoneksi($conn);
        arahkanKe("index.php");
    } else {
        echo "error: " . $hasil['error'];
    }

    tutupKoneksi($conn);
}
?>