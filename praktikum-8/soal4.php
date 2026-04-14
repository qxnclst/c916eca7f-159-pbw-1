<form method="POST" action="menu.php?page=soal4">
    <label for="angka" style="font-size: 0.9rem;">masukan angka:</label>
    <input type="number" name="angka" id="angka" required>
    <input type="submit" value="cek genap/ganjil">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['angka'])) {
    $angka = $_POST['angka'];
    
    echo "<div class='hasil'>";
    echo "<p>angka: <span>" . $angka . "</span></p>";
    
    $status = ($angka % 2 == 0) ? "genap" : "ganjil";
    
    echo "<p>status: <span>" . $status . "</span></p>";
    echo "</div>";
}
?>