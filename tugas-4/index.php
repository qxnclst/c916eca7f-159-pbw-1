<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>cafe stuff</title>
    <link rel="stylesheet" href="stylelele.css">
</head>
<body>
    <div class="struk-belanja">
        <h2>struk belanjaan kafe</h2>
        
        <?php
        define("PAJAK", 0.10);

        $harga_barang = [
            "kopi_susu" => 18000,
            "roti_bakar" => 12000
        ];

        $jumlah_kopi = 2;
        $jumlah_roti = 1;

        $total_kopi = $harga_barang["kopi_susu"] * $jumlah_kopi;
        $total_roti = $harga_barang["roti_bakar"] * $jumlah_roti;
        
        $subtotal = $total_kopi + $total_roti;
        $nilai_pajak = $subtotal * PAJAK;
        $total_akhir = $subtotal + $nilai_pajak;

        echo "<p><span>coffee w/ milk (x" . $jumlah_kopi . ")
        </span> <span>rp " . number_format($total_kopi, 0, ',', '.') . "</span></p>";
        
        echo "<p><span>toasted bread 🍞 (x" . $jumlah_roti . ")
        </span> <span>rp " . number_format($total_roti, 0, ',', '.') . "</span></p>";
        
        echo "<br>";
        echo "<p><span>subtotal:</span>
        <span>rp " . number_format($subtotal, 0, ',', '.') . "</span></p>";
        
        echo "<p><span>pajak (10%):</span>
        <span>rp " . number_format($nilai_pajak, 0, ',', '.') . "</span></p>";
        
        echo "<p class='garis-total'>
        <span>total akhir:</span>
        <span>rp " . number_format($total_akhir, 0, ',', '.') . "</span></p>";
        ?>
    </div>
</body>
</html>