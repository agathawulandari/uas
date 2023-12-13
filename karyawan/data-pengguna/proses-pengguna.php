<?php 

include("../../koneksi.php");

if (isset($_POST['perbarui_pengguna'])){
    $id_pengguna = $_POST["id_pengguna"];
    $nama_pengguna = $_POST["nama_pengguna"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $telp = $_POST["telp"];
    $alamat = $_POST["alamat"];
    $tipe = $_POST["tipe"];

    // untuk mengcek apakah sudah ada username yang diinputkan dan juga di cek berdasarkan id_pengguna yang tidak sama dgn yg sedang aktif
    $cekUsernameQuery = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$username' AND id_pengguna != '$id_pengguna'");
    $cekUsernameResult = mysqli_fetch_assoc($cekUsernameQuery);

    if ($cekUsernameResult) {
        $alertClass = 'alert-warning';
        $message = 'Username sudah digunakan oleh pengguna lain. Silahkan pilih username lain.';
        
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;

        header("Location: ../index.php?page=perbarui-pengguna&user=" . $id_pengguna);
        exit();
    }

    $perbarui = mysqli_query($koneksi,"UPDATE pengguna set nama_pengguna ='$nama_pengguna', email ='$email', telp ='$telp', alamat = '$alamat', username = '$username'  WHERE id_pengguna = '$id_pengguna'");

    if ($perbarui == true) {
        $alertClass = 'alert-success';
        $message = 'Data sukses diperbarui.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;

        header("Location: ../index.php?page=data-pengguna");
        exit();
    } else {
        $alertClass = 'alert-danger';
        $message = 'Data gagal diperbarui. Silahkan coba lagi.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;

        header("Location: ../index.php?page=perbarui-pengguna&user=" . $id_pengguna);
        exit();
    }
}


if (isset($_POST["tambah_pengguna"])) {
    $nama_pengguna = $_POST["nama_pengguna"]??"";
    $username = $_POST["username"]??"";
    $email = $_POST["email"]??"";
    $password = md5($_POST["password"])??"";
    $telp = $_POST["telp"]??"";
    $alamat = $_POST["alamat"]??"";
    // $tipe = $_POST["tipe"];
    $tipe = 3;

    // Periksa apakah username sudah digunakan
    $cek_username = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username ='$username'");
    if (mysqli_num_rows($cek_username) > 0) {
        echo "Username sudah digunakan. Silakan pilih username lain.";
        // Anda dapat menambahkan redirect atau tindakan lain setelah pesan ini
    } else {
        // Jika username belum digunakan, lakukan proses pendaftaran
        $query = "INSERT INTO pengguna (nama_pengguna, username, email, password, telp, alamat, tipe_akses) VALUES ('$nama_pengguna','$username', '$email', '$password', '$telp', '$alamat', '$tipe')";
        $result = mysqli_query($koneksi, $query);

        // Check if the query was successful
        if ($result !== false) {
            $alertClass = 'alert-success';
            $message = 'Data berhasil ditambahkan.';
            session_start();
            $_SESSION['alertClass'] = $alertClass;
            $_SESSION['message'] = $message;
            header('location:../index.php?page=data-pengguna');
        } else {
            // Handle query failure
            $alertClass = 'alert-danger';
            $message = 'Data gagal ditambahkan. Silahkan coba lagi.';
            session_start();
            $_SESSION['alertClass'] = $alertClass;
            $_SESSION['message'] = $message;
            header('location:../index.php?page=data-pengguna');
            exit();
        }
    }
}


if(isset($_POST['hapus_pengguna'])){
    $id_pengguna = $_POST['id_pengguna'];

    $hapus = mysqli_query($koneksi, "DELETE from pengguna WHERE id_pengguna = '$id_pengguna'");

    if($hapus==true){
        $alertClass = 'alert-success';
        $message = 'Data berhasil dihapus.';
        session_start();
        $_SESSION['alertClass'] = $alertClass;
        $_SESSION['message'] = $message;
        header('location:../index.php?page=data-pengguna');
        exit();
    }
}
?>