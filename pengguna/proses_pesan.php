<?php 
include('../koneksi.php');

if (isset($_POST["pesan_lapangan"])) {
    $id_kategori =isset($_POST['id_kategori']) ? $_POST['id_kategori'] : '';
    $id_lapangan = isset($_POST['id_lapangan']) ? $_POST['id_lapangan'] : '';
    $id_pengguna = isset($_POST['id_pengguna']) ? $_POST['id_pengguna'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $jam = isset($_POST['jam']) ? $_POST['jam'] : '';
    $durasi = isset($_POST['durasi']) ? $_POST['durasi'] : '';
    
   $query = "INSERT INTO pemesanan_lapangan (id_kategori, id_lapangan, id_pengguna, tgl_booking, jam_booking, durasi) VALUES ('$id_kategori', '$id_lapangan','$id_pengguna', '$tanggal', '$jam', '$durasi')";

       if ($query==true) {
        echo "sukses, silahkan klik disini <a href='index.php?page=pembayaran'>Disini</a>";
        
    }else{
        echo "gagal, silahkan klik  <a href='?index.php?page=pembayaran'>Disini</a>";
    }
    
    $result = mysqli_query($koneksi,$query);


    
}
?>