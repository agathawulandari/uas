<?php
session_start();

if(isset($_SESSION['username']) && ($_SESSION['tipe']) == 1) {
    header('location:umum/pemilik/index.php?page=home');
    exit(); 
} else if (isset($_SESSION['username']) && ($_SESSION['tipe']) == 2) {
    header('location:umum/karyawan/index.php?page=home');
    exit();
} else if (isset($_SESSION['username']) && ($_SESSION['tipe']) == 3) {
    header('location:umum/pengguna/index.php?page=home');
    exit();
} else {
    header('location:umum/index.php?page=home');
    exit();
}
?>