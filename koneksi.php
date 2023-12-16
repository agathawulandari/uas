<?php 

$koneksi = mysqli_connect("localhost","root","","uas");

if (mysqli_connect_errno()) {
    echo "Koneksi error". mysqli_connect_error();
}

?>