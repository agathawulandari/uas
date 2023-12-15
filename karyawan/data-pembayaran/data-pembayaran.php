<h2 class="text-center mt-5 mb-5">Data Pembayaran</h2>

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
        <!-- <a href="?page=tambah-pengguna" class="btn btn-primary mb-2">Tambah Pesanan</a> -->
        <thead class="text-center">
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Pengguna</th>
                <th>Id Pemesanan</th>
                <th>Metode</th>
                <th>Status</th>
                <th>Bukti Bayar</th>
                <th>Total</th>
            </tr>
        </thead>

            <?php 
                $no = 1;
                $datatabel = "SELECT
                        pembayaran.*,
                        pengguna.nama_pengguna 
                    FROM
                        pembayaran
                        LEFT JOIN pengguna ON pengguna.id_pengguna = pembayaran.id_pengguna";
                        $hasiltabel = mysqli_query($koneksi, $datatabel);
                        while ($tabel = mysqli_fetch_array($hasiltabel)) {
            ?>

        <tbody>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $tabel['id_pembayaran']?></td>
                <td><?= $tabel['nama_pengguna']??$tabel['id_pengguna']?></td>
                <td><?= $tabel['id_pemesanan']?></td>
                <td><?= $tabel['metode_pembayaran']?></td>
                <td><?= $tabel['status_pembayaran']?></td>
                <td><?= $tabel['bukti_bayar']?></td>
                <td><?= $tabel['total_pembayaran']?></td>
            </tr>
        </tbody>
        <?php }?>
    </table>
</div>