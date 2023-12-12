<?php
include('../koneksi.php');

if (isset($_POST["register"])) {
    $nama_pengguna = $_POST["nama_pengguna"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $telp = $_POST["telp"];
    $tipe = $_POST["tipe"];

    // Periksa apakah username sudah digunakan
    $cek_username = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username ='$username'");
    if (mysqli_num_rows($cek_username) > 0) {
        echo "Username sudah digunakan. Silakan pilih username lain.";
        // Anda dapat menambahkan redirect atau tindakan lain setelah pesan ini
    } else {
        // Jika username belum digunakan, lakukan proses pendaftaran
        $query = "INSERT INTO pengguna (nama_pengguna, username, email, password, telp, tipe_akses) VALUES ('$nama_pengguna','$username', '$email', '$password', '$telp', '$tipe')";
        $result = mysqli_query($koneksi, $query);

        // Check if the query was successful
        if ($result !== false) {
            header('location:../umum/index.php?page=halamanmasuk');
            exit();
        } else {
            // Handle query failure
            header('location:../umum/index.php?page=halamandaftar');
            exit();
        }
    }
}
?>