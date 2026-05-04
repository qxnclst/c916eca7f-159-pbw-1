<div style="text-align: center; margin-bottom: 15px; font-weight: bold; color: var(--accent-color);">
    input nama hewan
</div>

<form method="POST" action="menu.php?page=soal3">
    <label style="font-size: 0.9rem;">hewan 1:</label>
    <input type="text" name="hewan[]" required>
    
    <label style="font-size: 0.9rem;">hewan 2:</label>
    <input type="text" name="hewan[]" required>
    
    <label style="font-size: 0.9rem;">hewan 3:</label>
    <input type="text" name="hewan[]" required>
    
    <label style="font-size: 0.9rem;">hewan4:</label>
    <input type="text" name="hewan[]" required>
    
    <label style="font-size: 0.9rem;">hewan 5:</label>
    <input type="text" name="hewan[]" required>

    <input type="submit" value="Tampilkan">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hewan'])) {
    
    $daftar_hewan = $_POST['hewan'];
    
    echo "<div class='hasil'>";
    
    foreach ($daftar_hewan as $index => $nama) {
        echo "<p>No." . ($index + 1) . " <span>" . $nama . "</span></p>";
    }
    
    echo "</div>";
}
?>