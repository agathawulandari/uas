<h2 class="text-center mt-5">Data Anggota</h2>


<div class="row mt-5">
    <div class="col-md-12">
        <div class="col-md-6">
            <!-- action="data-anggota/anggota-aksi.php" -->
            <form class="d-flex" role="search" method="post">
                <input class="form-control me-2" type="search" name="tcari-data" placeholder="Masukkan Nama Pengguna / Username" aria-label="Search" value="<?php echo isset($_POST['tcari-data']) ? htmlspecialchars($_POST['tcari-data']) : ''; ?>">

                <button class="btn btn-outline-success" type="submit" name="cari-data">Cari</button>
                <a href="?page=data-anggota" class="btn btn-outline-danger">Batal</a>
            </form>
        </div>

        <table class="table table-bordered mt-2 text">
            <thead class="text-center">
                <tr>
                    <th>#</th>
                    <th>Nama Anggota</th>
                    <th>Username</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat Email</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;

                    // untuk cari data
                    if(isset($_POST['cari-data'])){
                        $tcari_data = $_POST['tcari-data'];

                        $sql = "SELECT * FROM pengguna WHERE (nama_pengguna like '%$tcari_data%' OR username LIKE '%$tcari_data%') AND tipe_akses=3 ORDER BY nama_pengguna ASC ";

                    } else {
                        $sql = "SELECT * FROM pengguna WHERE tipe_akses=3";
                    }

                    $data = mysqli_query($koneksi, $sql);
                    while ($d = mysqli_fetch_array($data)){
        
                ?>
        
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $d['nama_pengguna']; ?></td>
                    <td><?php echo $d['username']; ?></td>
                    <td><?php echo $d['telp']; ?></td>
                    <td><?php echo $d['email']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                </tr>
        
                <?php 
                    $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>