<h2 class="text-center mt-5 mb-5">Data Pengguna</h2>

<div class="container mb-5">

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

    <table class="table table-bordered">
        <a href="?page=tambah-pengguna" class="btn btn-primary mb-2">Tambah Pengguna</a>
        <thead class="text-center">
            <tr>
                <th>#</th>
                <th>Nama Pengguna</th>
                <th>Username</th>
                <th>Email</th>
                <th>No Telpon</th>
                <th>Alamat</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>

            <?php 
                $no = 1;
                $datatabel = "SELECT * FROM pengguna where tipe_akses = '3'";
                $hasiltabel = mysqli_query($koneksi, $datatabel);
                while ($tabel = mysqli_fetch_array($hasiltabel)) {
            ?>

        <tbody>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $tabel['nama_pengguna']?></td>
                <td><?= $tabel['username']?></td>
                <td><?= $tabel['email']?></td>
                <td><?= $tabel['telp']?></td>
                <td><?= $tabel['alamat']?></td>
                <td class="text-center"><a href="?page=perbarui-pengguna&user=<?php echo $tabel['id_pengguna']?>" class="btn btn-sm btn-warning">Perbarui</a></a></td>
                <td class="text-center"><a href="?page=hapus-pengguna&user=<?php echo $tabel['id_pengguna']?>" class="btn btn-sm btn-danger">Hapus</a></a></td>
            </tr>
        </tbody>
        <?php }?>
    </table>
</div>