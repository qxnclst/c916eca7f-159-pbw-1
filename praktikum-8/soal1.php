<form method="POST" action="menu.php?page=soal1">
    <label for="roda" style="font-size: 0.9rem;">masukan jumlah roda:</label>
    <input type="number" name="roda" id="roda" required>
    <input type="submit" value="cek kendaraan">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['roda'])) {
    $roda = $_POST['roda'];
    
    echo "<div class='hasil'>";
    echo "<p>rscoda: <span>" . $roda . "</span></p>";
    
    $jenis = "";
    switch ($roda) {
        case 2:
            $jenis = "motor";
            break;
        case 3:
            $jenis = "becak";
            break;
        case 4:
            $jenis = "mobil";
            break;
        default:
            if ($roda > 4) {
                $jenis = "kendaraan besaaaaaaaaaaaaar (truk, bus, dll)";
            } else {
                $jenis = "tidak valid!";
            }
            break;
    }
    
    echo "<p>Jenis: <span>" . $jenis . "</span></p>";
    echo "</div>";
}
?>