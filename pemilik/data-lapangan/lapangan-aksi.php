<?php 

include("../../koneksi.php");

if(isset($_POST['tambah-lapangan'])) {
    // untuk lapangan
    $queryLapangan = mysqli_query($koneksi, "SELECT MAX(SUBSTRING(id_lapangan, 2)) AS max_id FROM lapangan");
    $dLapangan = mysqli_fetch_assoc($queryLapangan);
    $idLapangan_terakhir = $dLapangan['max_id'] + 1;
    $id_lapangan = 'L' . str_pad($idLapangan_terakhir, 4, '0', STR_PAD_LEFT);
    // untuk kategori
    $queryKategori = mysqli_query($koneksi, "SELECT MAX(SUBSTRING(id_kategori, 2)) AS max_id FROM kategori");
    $dKategori = mysqli_fetch_assoc($queryKategori);
    $idKategori_terakhir = $dKategori['max_id'] + 1;
    $id_kategori = 'L' . str_pad($idKategori_terakhir, 4, '0', STR_PAD_LEFT);


    $lapangan = $_POST['nama_lapangan'] ?? " ";
    $kategori = $_POST['nama_kategori'] ?? " ";
    $deskripsi = $_POST['deskripsi'] ?? " ";
    $harga = $_POST['harga'] ?? " ";

    $tambah_kategori = mysqli_query($koneksi, "INSERT INTO kategori (id_kategori, nama_kategori, deskripsi, harga_kategori) VALUES ('$id_kategori', '$kategori', '$deskripsi', '$harga') ");

    $tambah_lapangan = mysqli_query($koneksi, "INSERT INTO lapangan (id_lapangan, id_kategori, nama_lapangan) VALUES ('$id_lapangan', '$id_kategori', '$lapangan') ");



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

if(isset($_POST['edit-lapangan'])) {
    $id_lapangan = $_POST['id_lapangan'];
    $id_kategori = $_POST['id_kategori'];
    $lapangan = $_POST['nama_lapangan'] ?? " ";
    $kategori = $_POST['nama_kategori'] ?? " ";
    $deskripsi = $_POST['deskripsi'] ?? " ";
    $harga = $_POST['harga'] ?? " ";

    // Update kategori
    $update_kategori = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$kategori', deskripsi='$deskripsi', harga_kategori='$harga' WHERE id_kategori='$id_kategori'");

    // Update lapangan
    $update_lapangan = mysqli_query($koneksi, "UPDATE lapangan SET nama_lapangan='$lapangan' WHERE id_lapangan='$id_lapangan'");


    // jika data yang dimasukkan benar
    if($update_lapangan==true){
        $alertClass = 'alert-success';
        $message = 'Data sukses diperbarui.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;
        header('location:../index.php?page=data-lapangan');
        exit();
    }else{
        $alertClass = 'alert-danger';
        $message = 'Data gagal diperbarui. Silahkan coba lagi.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;
        header('location:../index.php?page=edit-lapangan&id='.$id_lapangan);
        exit();
    }
    
}

if(isset($_POST['hapus-lapangan'])) {
    $id_lapangan = $_POST['id_lapangan'];
    $id_kategori = $_POST['id_kategori'];

    // delete kategori
    $delete_kategori = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");

    // delete lapangan
    $delete_lapangan = mysqli_query($koneksi, "DELETE FROM lapangan WHERE id_lapangan='$id_lapangan'");


    // jika data yang dimasukkan benar
    if($delete_lapangan==true){
        $alertClass = 'alert-success';
        $message = 'Data sukses dihapus.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;
        header('location:../index.php?page=data-lapangan');
        exit();
    }else{
        $alertClass = 'alert-danger';
        $message = 'Data gagal dihapus. Silahkan coba lagi.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;
        header('location:../index.php?page=edit-lapangan&id='.$id_lapangan);
        exit();
    }
    
}



?>