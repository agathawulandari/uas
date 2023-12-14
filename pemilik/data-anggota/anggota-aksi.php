<?php 

include("../../koneksi.php");

if(isset($_POST['tambah-anggota'])) {
    $nama_pengguna = $_POST['nama_pengguna'] ?? " ";
    $username = $_POST['username'] ?? " ";
    $email = $_POST['email'] ?? " ";
    $password = md5($_POST['password']) ?? " ";
    $telp = $_POST['telp'] ?? " ";
    $alamat = $_POST['alamat'] ?? " ";

    // Periksa apakah username sudah digunakan
    $cek_username = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username ='$username'");
    if (mysqli_num_rows($cek_username) > 0) {
        echo "Username sudah digunakan. Silakan pilih username lain.";
    }else {
        // Jika username belum digunakan, lakukan proses pendaftaran
        $tambah = mysqli_query($koneksi, "INSERT INTO pengguna VALUES ('','$nama_pengguna','$username','$email','$password','$telp','$alamat','3') ");

        // jika data yang dimasukkan benar
        if($tambah==true){
            $alertClass = 'alert-success';
            $message = 'Data berhasil ditambahkan.';
            session_start();
            $_SESSION['alertClass'] = $alertClass;
            $_SESSION['message'] = $message;
            header('location:../index.php?page=data-anggota');
            exit();
        }else{
            $alertClass = 'alert-danger';
            $message = 'Data gagal ditambahkan. Silahkan coba lagi.';
            session_start();
            $_SESSION['alertClass'] = $alertClass;
            $_SESSION['message'] = $message;
            header('location:../index.php?page=tambah-anggota');
            exit();
        }
    }

}

?>