<?php 
include('../koneksi.php');

if (isset($_POST["pesan_lapangan"])) {


     // untuk pemesanan
    $query = "SELECT MAX(id_pemesanan) as max_id FROM pemesanan_lapangan";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $last_id = $row['max_id'];
    $last_number = intval(substr($last_id, 2));
    $new_number = $last_number + 1;
    $id_pemesanan = "PL" . str_pad($new_number, 3, "0", STR_PAD_LEFT);
    
    $id_kategori =isset($_POST['id_kategori']) ? $_POST['id_kategori'] : '';
    $id_lapangan = isset($_POST['id_lapangan']) ? $_POST['id_lapangan'] : '';
    $id_pengguna = isset($_POST['id_pengguna']) ? $_POST['id_pengguna'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $jam = isset($_POST['jam']) ? $_POST['jam'] : '';
    $durasi = isset($_POST['durasi']) ? $_POST['durasi'] : '';
    $harga_lapangan = isset($_POST['harga_kategori']) ? $_POST['harga_kategori'] : '';
    
    // untuk menghitung waktu habis main
    $mulai_waktu = strtotime($jam);
    $habis_waktu = $mulai_waktu + (intval($durasi) * 3600);
    $habis = date('H:i:s', $habis_waktu);  
    


    // menghitung total harga
    $total = intval($durasi) * intval($harga_lapangan);
    
   $query = "INSERT INTO pemesanan_lapangan (
    id_pemesanan,
    id_kategori, 
    id_lapangan, 
    id_pengguna, 
    tgl_booking, 
    jam_booking, 
    durasi,
    jam_habis,
    total_harga,
    created_at) VALUES (
    '$id_pemesanan',
    '$id_kategori', 
    '$id_lapangan',
    '$id_pengguna', 
    '$tanggal', 
    '$jam', 
    '$durasi',
    '$habis',
    '$total',
    NOW())";

       if ($query==true) {
        echo "sukses, silahkan klik disini <a class='btn btn-primary' href='index.php?page=pembayaran'>Disini</a>";
        
    }else{
        echo "gagal, silahkan klik  <a class='btn btn-primary' href='?index.php?page=pembayaran'>Disini</a>";
    }
    
    $result = mysqli_query($koneksi,$query);
}

if (isset($_POST['bukti'])) {
     // untuk bayar
    $query = "SELECT MAX(id_pembayaran) as max_id FROM pembayaran";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $last_id = $row['max_id'];
    $last_number = intval(substr($last_id, 2));
    $new_number = $last_number + 1;
    $id_pembayaran= "P" . str_pad($new_number, 4, "0", STR_PAD_LEFT);
    
    $id_pemesanan = $_POST['id_pemesanan'];
    $id_pengguna = $_POST['id_pengguna'];
    $id_kategori = $_POST['id_kategori'];
    $id_lapangan = $_POST['id_lapangan'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $status_pembayaran = $_POST['status_pembayaran'];
    // $bukti_bayar = $_POST['bukti_bayar'];
    $bukti_bayar_path = $_POST['bukti_bayar'];

    // move_uploaded_file($id_pengguna, $bukti_bayar_path);
    
    $query = "INSERT INTO pembayaran (id_pembayaran,id_pengguna, id_pemesanan, metode_pembayaran, status_pembayaran, bukti_bayar, created_at) VALUES ('$id_pembayaran','$id_pengguna', '$id_pemesanan', '$metode_pembayaran', '$status_pembayaran','$bukti_bayar_path', NOW())";

      

    mysqli_query($koneksi, $query);

   if ($query==true) {
        echo "sukses, silahkan klik disini <a class='btn btn-primary' href='index.php?page=pembayaran'>Disini</a>";
        
    }else{
        echo "gagal, silahkan klik  <a class='btn btn-primary' href='?index.php?page=pembayaran'>Disini</a>";
    }
    
}
?>