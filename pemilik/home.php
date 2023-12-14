<h2 class="text-center mt-5">Halaman Home</h2>

<div class="row text-center mt-5">
    <div class="col">
        <div class="card bg-danger text-dark">
            <div class="card-header">
                <h3> Data Karyawan </h3>
            </div>
            <div class="card-body">
                <?php 
                    $karyawan = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE tipe_akses=2 ");
                    $tkaryawan = mysqli_num_rows($karyawan);
                    echo '<h1>'. $tkaryawan .'</h1>';
                ?>
            </div>
            <div class="card-footer">
                <a href="?page=data-karyawan" class="btn btn-link text-dark">Detail</a>
            </div>
        </div>  
    </div>
    <div class="col">
        <div class="card bg-warning text-dark">
            <div class="card-header">
                <h3> Data Anggota </h3>
            </div>
            <div class="card-body">
                <?php 
                    $anggota = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE tipe_akses=3 ");
                    $tanggota = mysqli_num_rows($anggota);
                    echo '<h1>'. $tanggota .'</h1>';
                ?>
            </div>
            <div class="card-footer">
                <a href="?page=data-anggota" class="btn btn-link text-dark">Detail</a>
            </div>
        </div>  
    </div>
<div class="row text-center mt-5">
    <div class="col">
        <div class="card bg-success text-dark">
            <div class="card-header">
                <h3> Data Lapangan </h3>
            </div>
            <div class="card-body">
                <?php 
                    // $anggota = mysqli_query($koneksi, "SELECT * FROM p_anggota ");
                    // $tanggota = mysqli_num_rows($anggota);
                    // echo '<h1>'. $tanggota .'</h1>';
                ?>
            </div>
            <div class="card-footer">
                <a href="?page=data-lapangan" class="btn btn-link text-dark">Detail</a>
            </div>
        </div>        
    </div>
    <div class="col">
        <div class="card bg-info text-dark">
            <div class="card-header">
                <h3> Data Pemasukan </h3>
            </div>
            <div class="card-body">
                <?php 
                    // $anggota = mysqli_query($koneksi, "SELECT * FROM p_anggota ");
                    // $tanggota = mysqli_num_rows($anggota);
                    // echo '<h1>'. $tanggota .'</h1>';
                ?>
            </div>
            <div class="card-footer">
                <a href="?page=data-pemasukan" class="btn btn-link text-dark">Detail</a>
            </div>
        </div>        
    </div>
</div>