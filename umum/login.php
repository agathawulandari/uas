<?php 

    include ('koneksi.php');
    
    session_start();
    if(isset($_POST["login"])) {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["tipe"] = $_POST["tipe"];

        $cekdata = mysqli_query($koneksi,"SELECT * FROM p_akses WHERE username ='".$_POST['username']."' AND password = '".md5($_POST['password'])."' and tipe_akses ='".$_POST['tipe']."'");
        $periksadata = mysqli_num_rows($cekdata);
        if($periksadata>0){
            if($_POST["tipe"] == 1 ){
                header('location:../pimpinan/index.php');
            } else if($_POST["tipe"] == 2 ){
                header('location:../karyawan/index.php');
            } else {
                header('location:../anggota/index.php');
            }
        } else {
            header('location:../umum/index.php?page=tentang');
        }
    }
?>