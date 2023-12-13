<?php 

    include ('../koneksi.php');
    
    session_start();
    if(isset($_POST["login"])) {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];

        $cekdata = mysqli_query($koneksi,"SELECT * FROM pengguna WHERE username = '".($_POST['username'])."' AND password = '".md5($_POST['password'])."'");
        $row = mysqli_fetch_array($cekdata);
        $periksadata = mysqli_num_rows($cekdata);
        if($periksadata>0){
            if($row['tipe_akses'] == 1 ){
                header('location:../pemilik/index.php?page=home');
                exit();
            } else if($row['tipe_akses'] == 2 ){
                header('location:../karyawan/index.php?page=home');
                exit();
            } else {
                header('location:../pengguna/index.php?page=home');
                exit();
            }
        } else {
            header('location:../umum/index.php?page=halamanmasuk');
            exit();
        }
    }
?>