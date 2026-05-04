<form method="POST" action="menu.php?page=soal2">
    <label for="batas" style="font-size: 0.9rem;">masukkan batas angka:</label>
    <input type="number" name="batas" id="batas" min="2" required>
    <input type="submit" value="cetak genap">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['batas'])) {
    $batas = $_POST['batas'];
    
    echo "<div class='hasil'>";
    echo "<div style='text-align: center; margin-bottom: 10px; font-weight: bold; color: var(--accent-color);'>bilangan genap sampai $batas</div>";
    
    for ($i = 2; $i <= $batas; $i += 2) {
        echo "<p>angka: <span>" . $i . "</span></p>";
    }
    
    echo "</div>";
}
?>