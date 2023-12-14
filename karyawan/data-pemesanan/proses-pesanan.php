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


if (isset($_POST["tambah_pesanan"])) {
    $pilihanakun = $_POST["pilihanakun"];

    if ($pilihanakun == "Ada") {
        $id_pengguna = $_POST["id_pengguna"];
    } else {
        // Jika "Tidak Punya Akun", ambil data dari input
        $id_pengguna = $_POST["id_pengguna_input"];
    }
    $id_lapangan = $_POST["id_lapangan"]??NULL;
    

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
        
        $query = "INSERT INTO pemesanan_lapangan (id_pemesanan, id_lapangan, id_pengguna) VALUES ('$new_id', '$id_lapangan','$id_pengguna')";
        $result = mysqli_query($koneksi, $query);

        // Check if the query was successful
        if ($result !== false) {
            header('location:../index.php?page=data-pesanan');
            exit();
        } else {
            
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