<?php
session_start();
$_SESSION["username"] = true;

if(isset($_SESSION['username']) && ($_SESSION['tipe']) == 1) {
    header('location:pemilik/index.php?page=home');
    exit(); 
} else if (isset($_SESSION['username']) && ($_SESSION['tipe']) == 2) {
    header('location:karyawan/index.php?page=home');
    exit();
} else if (isset($_SESSION['username']) && ($_SESSION['tipe']) == 3) {
    header('location:pengguna/index.php?page=home');
    exit();
} else {
    header('location:umum/index.php?page=home');
    exit();
}
?>