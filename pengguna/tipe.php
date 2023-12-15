<?php 
include('../koneksi.php');
?>

<div class="container">
    <header>
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal text-body-emphasis">TIPE</h1>
            <p class="fs-5 text-body-secondary">Pilih Tipe Lapangan Yang Anda Inginkan</p>
        </div>
    </header>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <?php 
    $data = mysqli_query($koneksi, "SELECT * FROM kategori");
    
    while($d = mysqli_fetch_array($data)) {
        
        ?>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-primary" style="height: 25rem;">
                <div class="card-header py-3 text-bg-primary border-primary">
                    <h4 class="my-0 fw-normal"><?php echo $d ['nama_kategori']; ?></h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?php echo $d ['harga_kategori']; ?><small
                            class="text-body-secondary fw-light">/jam</small>
                    </h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li><?php echo $d ['deskripsi']; ?></li>
                    </ul>
                    <div class="container text-center position-absolute bottom-0 start-0 mb-3">
                        <div class="row g-2">
                            <div class="col-6">
                                <a href="?page=jadwal&kategori=<?php echo $d ['id_kategori'] ?>"
                                    class="btn btn-lg btn-outline-secondary w-100">Jadwal</a>
                            </div>
                            <div class="col-6">
                                <a href="?page=lapangan&kategori=<?php echo $d ['id_kategori'] ?>"
                                    class="btn btn-lg btn-primary w-100">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        }
            
            ?>
    </div>

    <h2 class="display-6 text-center mb-5 mt-5">Sewa Kebutuhan Badminton</h2>
    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
            <div class="card-header py-3 text-bg-primary border-primary">
                <h4 class="my-0 fw-normal">Raket</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">harga<small class="text-body-secondary fw-light">/jam</small>
                </h1>

                <div class="container text-center">
                    <div class="row g-2">

                        <div class="col-6">
                            <a href="?page=lapangan&kategori=<?php echo $d ['id_kategori'] ?>"
                                class="btn btn-lg btn-primary w-100">Pesan</a>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

</div>