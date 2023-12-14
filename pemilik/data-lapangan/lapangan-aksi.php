<?php 

include("../../koneksi.php");

if(isset($_POST['tambah-lapangan'])) {
    $lapangan = $_POST['nama_lapangan'] ?? " ";
    $kategori = $_POST['nama_kategori'] ?? " ";
    $deskripsi = $_POST['deskripsi'] ?? " ";
    $harga = $_POST['harga'] ?? " ";

    $tambah_kategori = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori, deskripsi, harga_kategori) VALUES ('$kategori','$deskripsi','$harga') ");

    $id_kategori_baru = mysqli_insert_id($koneksi);

    $tambah_lapangan = mysqli_query($koneksi, "INSERT INTO lapangan (id_kategori, nama_lapangan) VALUES ('$id_kategori_baru','$lapangan') ");


    // jika data yang dimasukkan benar
    if($tambah_lapangan==true){
        $alertClass = 'alert-success';
        $message = 'Data berhasil ditambahkan.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;
        header('location:../index.php?page=data-lapangan');
        exit();
    }else{
        $alertClass = 'alert-danger';
        $message = 'Data gagal ditambahkan. Silahkan coba lagi.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;
        header('location:../index.php?page=tambah-lapangan');
        exit();
    }

}

?>