<?php 

include("../../koneksi.php");

if(isset($_POST['tambah-karyawan'])) {
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
        $tambah = mysqli_query($koneksi, "INSERT INTO pengguna VALUES ('','$nama_pengguna','$username','$email','$password','$telp','$alamat','2') ");

        // jika data yang dimasukkan benar
        if($tambah==true){
            $alertClass = 'alert-success';
            $message = 'Data berhasil ditambahkan.';
            session_start();
            $_SESSION['alertClass'] = $alertClass;
            $_SESSION['message'] = $message;
            header('location:../index.php?page=data-karyawan');
            exit();
        }else{
            $alertClass = 'alert-danger';
            $message = 'Data gagal ditambahkan. Silahkan coba lagi.';
            session_start();
            $_SESSION['alertClass'] = $alertClass;
            $_SESSION['message'] = $message;
            header('location:../index.php?page=tambah-karyawan');
            exit();
        }
    }

}

if(isset($_POST['edit-karyawan'])) {
    $id_pengguna = $_POST['id_pengguna'];
    $nama_pengguna = $_POST['nama_pengguna']  ?? " ";
    $username = $_POST['username']  ?? " ";
    $email = $_POST['email']  ?? " ";
    $telp = $_POST['telp']  ?? " ";
    $alamat = $_POST['alamat']  ?? " ";
    $tipe = $_POST['tipe'];

    // untuk mengcek apakah sudah ada username yang diinputkan dan juga di cek berdasarkan id_pengguna yang tidak sama dgn yg sedang aktif
    $cekUsernameQuery = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$username' AND id_pengguna != '$id_pengguna'");
    $cekUsernameResult = mysqli_fetch_assoc($cekUsernameQuery);

    if ($cekUsernameResult) {
        $alertClass = 'alert-warning';
        $message = 'Username sudah digunakan oleh pengguna lain. Silahkan pilih username lain.';
        
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;

        header('location:../index.php?page=edit-karyawan&id='.$id_pengguna);
        exit();
    }

    $perbarui = mysqli_query($koneksi,"UPDATE pengguna SET nama_pengguna='$nama_pengguna', username='$username', email='$email', telp='$telp', alamat = '$alamat'  WHERE id_pengguna='$id_pengguna'");

    if ($perbarui == true) {
        $alertClass = 'alert-success';
        $message = 'Data sukses diperbarui.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;

        header('location:../index.php?page=data-karyawan');
        exit();
    } else {
        $alertClass = 'alert-danger';
        $message = 'Data gagal diperbarui. Silahkan coba lagi.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;

        header('location:../index.php?page=edit-karyawan&id=' . $id_pengguna);
        exit();
    }

}

if(isset($_POST['hapus-karyawan'])){
    $id_pengguna = $_POST['id_pengguna'];

    $hapus = mysqli_query($koneksi, "DELETE from pengguna WHERE id_pengguna = '$id_pengguna'");

    if($hapus==true){
        $alertClass = 'alert-success';
        $message = 'Data berhasil dihapus.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;
        header('location:../index.php?page=data-karyawan');
        exit();
    }
}

?>