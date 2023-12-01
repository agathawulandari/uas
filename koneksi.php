<?php 

$koneksi = mysqli_connect("localhost","root","","gaji");

if (mysqli_connect_errno()) {
    echo "Koneksi error". mysqli_connect_error();
}

?>