<?php 

$koneksi = mysqli_connect("localhost","root","","coba_uas");

if (mysqli_connect_errno()) {
    echo "Koneksi error". mysqli_connect_error();
}

?>