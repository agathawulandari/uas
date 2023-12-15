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
        echo "sukses, silahkan klik disini <a class='btn btn-primary' href='index.php?page=pembayaran'>Disini</a>";
        
    }else{
        echo "gagal, silahkan klik  <a class='btn btn-primary' href='?index.php?page=pembayaran'>Disini</a>";
    }
    
    $result = mysqli_query($koneksi,$query);
}

if (isset($_POST['bukti'])) {
    $id_pemesanan = $_POST['id_pemesanan'];
    $id_pengguna = $_POST['id_pengguna'];
    $id_raket = $_POST['id_raket'];
    $id_kategori = $_POST['id_kategori'];
    $id_lapangan = $_POST['id_lapangan'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $status_pembayaran = $_POST['status_pembayaran'];
    // $bukti_bayar = $_POST['bukti_bayar'];
    $bukti_bayar_path = $_POST['bukti_bayar'];

    // move_uploaded_file($id_pengguna, $bukti_bayar_path);
    
    $query = "INSERT INTO pembayaran (id_pengguna, id_pemesanan, id_raket, metode_pembayaran, status_pembayaran, bukti_bayar, created_at) VALUES ('$id_pengguna', '$id_pemesanan', '$id_raket', '$metode_pembayaran', '$status_pembayaran','$bukti_bayar_path', NOW())";

    mysqli_query($koneksi, $query);

   if ($query==true) {
        echo "sukses, silahkan klik disini <a class='btn btn-primary' href='index.php?page=pembayaran'>Disini</a>";
        
    }else{
        echo "gagal, silahkan klik  <a class='btn btn-primary' href='?index.php?page=pembayaran'>Disini</a>";
    }
    
}
?>