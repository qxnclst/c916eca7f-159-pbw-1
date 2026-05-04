<?php
// cek apakah user sudah login
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("please log in first"));
    exit;
}
?>
<?php
// memuat file koneksi beserta fungsi-fungsinya
include 'koneksi.php';

// fungsi untuk mengambil semua data buku dari database
function ambilSemuaBuku($koneksi)
{
    $sql = "SELECT * FROM buku";
    $hasil = jalankanQuery($koneksi, $sql);
    $daftarBuku = [];

    // kumpulkan semua baris ke dalam array
    while ($baris = $hasil->fetch_assoc()) {
        $daftarBuku[] = $baris;
    }

    return $daftarBuku;
}

// fungsi untuk merender satu baris tabel buku
function renderBarisBuku($buku)
{
    $idBuku = $buku['id'];
    $output = "<tr>";
    $output .= "<td>{$buku['id']}</td>";
    $output .= "<td>{$buku['judul']}</td>";
    $output .= "<td>{$buku['penulis']}</td>";
    $output .= "<td>{$buku['tahun_terbit']}</td>";
    $output .= "<td>{$buku['harga']}</td>";
    $output .= "<td>{$buku['stok']}</td>";
    $output .= "<td>";
    $output .= "<a href='edit.php?id={$idBuku}' class='aksi-link'>edit</a> ";
    $output .= "<a href='hapus.php?id={$idBuku}' class='aksi-link' onclick=\"return confirm('yakin hapus?')\">hapus</a>";
    $output .= "</td>";
    $output .= "</tr>";
    return $output;
}

// ambil data
$semuaBuku = ambilSemuaBuku($conn);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>aplikasi pengelolaan buku</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>daftar buku</h2>
        <a href="tambah.php" class="btn-tambah">tambah buku baru</a>
        <a href="logout.php" class="btn-logout">logout</a>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>judul</th>
                    <th>penulis</th>
                    <th>tahun terbit</th>
                    <th>harga</th>
                    <th>stok</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // render tiap buku menggunakan fungsi
                foreach ($semuaBuku as $buku) {
                    echo renderBarisBuku($buku);
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>