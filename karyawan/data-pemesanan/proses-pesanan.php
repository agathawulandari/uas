<?php 

include("../../koneksi.php");


if (isset($_POST["tambah_pesanan"])) {

    $id_pengguna = $_POST["id_pengguna_input"];
    
    $id_lapangan = $_POST["id_lapangan"]??NULL;
    $tanggal_booking = $_POST["tanggal_booking"]??NULL;
    $jam_booking = $_POST["jam_booking"]??NULL; 
    $durasi = $_POST["durasi"]??NULL;
    $id_kategori = $_POST["id_kategori"]??NULL;
    $harga_lapangan = $_POST["harga_lapangan"]??NULL;

    // untuk menghitung waktu habis main
    $mulai_waktu = strtotime($jam_booking);
    $habis_waktu = $mulai_waktu + (intval($durasi) * 3600);
    $habis = date('H:i:s', $habis_waktu);    

    // menghitung total harga
    $total = intval($durasi) * $harga_lapangan;

    // Ambil nomor faktur terakhir dari tabel pemesanan_lapangan
    $query = "SELECT MAX(id_pemesanan) as max_id FROM pemesanan_lapangan";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $last_id = $row['max_id'];
    $last_number = intval(substr($last_id, 2));
    $new_number = $last_number + 1;
    $new_id = "PL" . str_pad($new_number, 3, "0", STR_PAD_LEFT); // Menghasilkan format "PL001"


    // data pembayaran
    $metode = "Cash";
    $status = "Lunas";
    $bukti_bayar = "-";
        
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
                created_at) 
            VALUES (
                '$id_pemesanan', 
                '$id_kategori', 
                '$id_lapangan', 
                '$id_pengguna',
                '$tanggal_booking', 
                '$jam_booking', 
                '$durasi',
                '$habis',
                '$total',
                NOW())";

        $result = mysqli_query($koneksi, $query);

        // Check if the query was successful
        if ($result !== false) {
            $pembayaran = "INSERT INTO pembayaran (
                    id_pembayaran,
                    id_pengguna,
                    id_pemesanan,
                    metode_pembayaran,
                    status_pembayaran,
                    bukti_bayar,
                    created_at,
                    total_pembayaran)
                VALUES (
                    '',
                    '$id_pengguna',
                    '$id_pemesanan',
                    '$metode',
                    '$status',  
                    '$bukti_bayar',
                    NOW(),
                    '$total')
            ";

            $bayar = mysqli_query($koneksi, $pembayaran);
            header('location:../index.php?page=data-pesanan');
            exit();
        } else {
            
        }
    }

?>