<?php
session_start();
// memuat koneksi database
include 'koneksi.php';

// fungsi untuk mencari pengguna berdasarkan nama dan katasandi
function cariPengguna($koneksi, $nama, $sandi)
{
    $stmt = $koneksi->prepare("SELECT id, nama, katasandi FROM pengguna WHERE nama = ? AND katasandi = ?");
    $stmt->bind_param("ss", $nama, $sandi);
    $stmt->execute();
    $hasil = $stmt->get_result();

    // kembalikan data user kalau ditemukan, null kalau tidak
    if ($hasil->num_rows === 1) {
        $data = $hasil->fetch_assoc();
        $stmt->close();
        return $data;
    }

    $stmt->close();
    return null;
}

// fungsi untuk menyimpan session login
function simpanSessionLogin($userData)
{
    $_SESSION['id'] = $userData['id'];
    $_SESSION['nama'] = $userData['nama'];
    $_SESSION['login_Un51k4'] = true;
}

// proses jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputNama = $_POST['username'];
    $inputSandi = $_POST['password'];

    $pengguna = cariPengguna($conn, $inputNama, $inputSandi);

    if ($pengguna !== null) {
        // login berhasil, simpan session lalu redirect
        simpanSessionLogin($pengguna);
        tutupKoneksi($conn);
        arahkanKe("index.php");
    } else {
        // login gagal, kembali ke halaman login dengan pesan
        tutupKoneksi($conn);
        arahkanKe("login.php?message=" . urlencode("password salah!!"));
    }
}
?>