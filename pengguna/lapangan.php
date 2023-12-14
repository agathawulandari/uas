<?php 
include('../koneksi.php');
$kategori  = isset($_GET['kategori']) ? $_GET['kategori'] :'';
?>
<div class="container">
    <header>
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal text-body-emphasis">Lapangan</h1>
            <p class="fs-5 text-body-secondary">Pilih Nomor Lapangan Yang Anda Inginkan</p>
        </div>
    </header>
    <?php 
// if (isset($_SESSION['alert']) && isset($_SESSION['message'])) {
//    $alert = $_SESSION['alert'];
//    $message = $_SESSION['message'];

//    echo '<div class="alert'.$alert.' alert-dismissible fade show" role="alert">'.$message.'</div>';

//    unset($_SESSION['alert']);
//    unset($_SESSION['message']);
// }



        $kategori = $_GET['kategori'];
        $data = mysqli_query($koneksi, "SELECT * FROM lapangan");
        while ($d = mysqli_fetch_array($data)) {
        if ($d['id_kategori'] == $kategori) {
        ?>
    <div class="row row-cols-1 row-cols-md-4 mb-3">
        <div class="col">
            <div class="col-3 mb-3">
                <div class="card" style="width: 10rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><?php echo $d ['nama_lapangan']; ?></p>
                        <a href="?page=pesan&kategori=<?php echo $d ['id_kategori'] ?>&lapangan=<?php echo $d ['id_lapangan'] ?>"
                            class="btn btn-sm btn-primary">Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
}
}

?>
</div>