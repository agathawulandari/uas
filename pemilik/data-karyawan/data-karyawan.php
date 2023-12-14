<h2 class="text-center mt-5">Data Karyawan</h2>


<div class="row mt-5">
    <div class="col-md-12">
        <?php 
            if (isset($_SESSION['alertClass']) && isset($_SESSION['message'])) {
                $alertClass = $_SESSION['alertClass'];
                $message = $_SESSION['message'];
            
                echo '<div class="alert ' . $alertClass . ' alert-dismissible fade show" role="alert">
                        ' . $message . '
                    </div>';
                
                unset($_SESSION['alertClass']);
                unset($_SESSION['message']);
            }
        ?>


        <a href="?page=tambah-karyawan" class="btn btn-outline-primary">Tambah Data</a>

        <table class="table table-bordered mt-2 text">
            <thead class="text-center">
                <tr>
                    <th>#</th>
                    <th>Nama Karyawan</th>
                    <th>Username</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat Email</th>
                    <th>Alamat</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                    $data = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE tipe_akses=2");
                    while ($d = mysqli_fetch_array($data)){
        
                ?>
        
                <tr class="text-center">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $d['nama_pengguna']; ?></td>
                    <td><?php echo $d['username']; ?></td>
                    <td><?php echo $d['telp']; ?></td>
                    <td><?php echo $d['email']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><a href="?page=edit-karyawan&id=<?php echo $d['id_pengguna']; ?>" class="btn btn-sm btn-outline-warning">Edit</a></td>
                    <td><a href="?page=hapus-karyawan&id=<?php echo $d['id_pengguna']; ?>" class="btn btn-sm btn-outline-danger">Hapus</a></td>
                </tr>
        
                <?php 
                    $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>