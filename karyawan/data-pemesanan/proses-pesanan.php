<?php 

include("../../koneksi.php");


if (isset($_POST["tambah_pesanan"])) {

    // Untuk menyimpan dari radio button
    $pilihanakun = $_POST["pilihanakun"];
    if ($pilihanakun == "Ada") {
        $id_pengguna = $_POST["id_pengguna"];
    } else {
        // Jika "Tidak Punya Akun", ambil data dari input
        $id_pengguna = $_POST["id_pengguna_input"];
    }

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

    $total = intval($durasi) * $harga_lapangan;

    $timezone = new DateTimeZone('Asia/Jakarta');
    $date_time_Obj = date_create('now', $timezone);
    $date_time = $date_time_Obj->format('Y-m-d H:i:s');

        // Ambil nomor faktur terakhir dari tabel pemesanan_lapangan
        $query = "SELECT MAX(id_pemesanan) as max_id FROM pemesanan_lapangan";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);

        // Ekstrak angka dari nomor faktur terakhir
        $last_id = $row['max_id'];
        $last_number = intval(substr($last_id, 2)); // Mengambil angka setelah "PL"

        // Buat nomor faktur baru
        $new_number = $last_number + 1;
        $new_id = "PL" . str_pad($new_number, 3, "0", STR_PAD_LEFT); // Menghasilkan format "PL001"
        
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
                '$new_id', 
                '$id_kategori', 
                '$id_lapangan', 
                '$id_pengguna',
                '$tanggal_booking', 
                '$jam_booking', 
                '$durasi',
                '$habis',
                '$total',
                '$date_time')";
        $result = mysqli_query($koneksi, $query);

        // Check if the query was successful
        if ($result !== false) {
            header('location:../index.php?page=data-pesanan');
            exit();
        } else {
            
        }
    }

?>