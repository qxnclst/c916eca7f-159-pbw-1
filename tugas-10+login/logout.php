<?php
// proses logout, hapus semua session
session_start();
session_unset();
session_destroy();

// redirect ke halaman login
header("Location: login.php");
exit;
?>
