<?php 

    include ('../koneksi.php');
    
    session_start();
    if(isset($_POST["login"])) {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["tipe"] = $_POST["tipe"];

        $cekdata = mysqli_query($koneksi,"SELECT * FROM pengguna WHERE username = '".($_POST['username'])."' AND password = '".$_POST['password']."' AND tipe_akses ='".$_POST['tipe']."'");
        $periksadata = mysqli_num_rows($cekdata);
        if($periksadata>0){
            if($_POST["tipe"] == 1 ){
                header('location:../pemilik/index.php?page=home');
            } else if($_POST["tipe"] == 2 ){
                header('location:../karyawan/index.php?page=home');
            } else {
                header('location:../pengguna/index.php?page=home');
            }
        } else {
            header('location:../umum/index.php?page=halamanmasuk');
        }
    }
?>