<?php 
    $kategori = $_GET['kategori'];
    $nama = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = '$kategori'");
    $tipe = mysqli_fetch_array($nama);
?>
<div class="container">
    <header>
        <div class="pricing-header py-5 mx-auto text-center">
            <h2 class="text-body-emphasis">Nomor Lapangan <?php echo $tipe['nama_kategori']?></h2>
            <p class="fs-5 text-body-secondary">Pilih Nomor Lapangan Yang Anda Inginkan</p>
        </div>
    </header>
    <?php 
        $data = mysqli_query($koneksi, "SELECT * FROM lapangan");
            while ($d = mysqli_fetch_array($data)) {
                if ($d['id_kategori'] == $kategori) {
                ?>
                <div class="row row-cols-1 row-cols-md-4 mb-3">
                    <div class="col ">
                        <div class="col-3 mb-3">
                            <div class="card" style="width: 25rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text"><?php echo $d['nama_lapangan']; ?></p>
                                    <!-- <p class="card-text"><?php echo $d ['deskripsi']; ?></p> -->
                                    <a href="?page=tambah-pesanan&kategori=<?php echo $kategori;?>&lapangan=<?php echo $d['id_lapangan'] ?>" class="btn btn-sm btn-primary">Pesan</a>
                                    <a href="?page=jadwal-lap&kategori=<?php echo $d ['id_kategori']?>&lapangan=<?= $d['id_lapangan']?>" class="btn btn-sm btn-secondary">Jadwal</a>
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