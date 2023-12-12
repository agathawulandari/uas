<?php
$_SESSION = [];
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="0;url=../umum/index.php?page=home"> <!-- Gantilah "home.php" dengan URL halaman home Anda -->
</head>
<body>
    <!-- Konten halaman ini tidak akan ditampilkan karena pengguna akan diarahkan ke halaman home -->
</body>
</html>
<?php exit();?>