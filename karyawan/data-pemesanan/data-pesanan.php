<h2 class="text-center mt-5 mb-5">Data Pesanan</h2>

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
                <th>Nama</th>
                <th>Lapangan</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Jam Booking</th>
                <th>Durasi</th>
                <th>Jam Habis</th>
                <th>Harga Kategori</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>

            <?php 
                $no = 1;
                $datatabel = "SELECT
                        pemesanan_lapangan.id_pemesanan,
                        lapangan.nama_lapangan,
                        pengguna.username,
                        kategori.nama_kategori,
                        pemesanan_lapangan.tgl_booking,
                        pemesanan_lapangan.jam_booking,
                        pemesanan_lapangan.durasi,
                        kategori.harga_kategori,
                        pemesanan_lapangan.total_harga,
                        pemesanan_lapangan.jam_habis,
                        pengguna.id_pengguna,
                        pemesanan_lapangan.id_pengguna as nama
                    FROM
                        pemesanan_lapangan
                        LEFT JOIN pengguna ON pengguna.id_pengguna = pemesanan_lapangan.id_pengguna
                        LEFT JOIN lapangan ON lapangan.id_lapangan = pemesanan_lapangan.id_lapangan
                        LEFT JOIN kategori ON lapangan.id_kategori = kategori.id_kategori";
                        $hasiltabel = mysqli_query($koneksi, $datatabel);
                        while ($tabel = mysqli_fetch_array($hasiltabel)) {
            ?>

        <tbody>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $tabel['id_pemesanan']?></td>
                <td><?= $tabel['username']??$tabel['nama']?></td>
                <td><?= $tabel['nama_lapangan']?></td>
                <td><?= $tabel['nama_kategori']?></td>
                <td><?= $tabel['tgl_booking']?></td>
                <td><?= $tabel['jam_booking']?></td>
                <td><?= $tabel['durasi']?></td>
                <td><?= $tabel['jam_habis'] ?></td>
                <td><?= $tabel['harga_kategori']?></td>
                <td><?= $tabel['total_harga']?></td>
                <td></td>
                <td></td>
                <td class="text-center"><a href="?page=perbarui-pesanan&pesanan=<?php echo $tabel['id_pemesanan']?>" class="btn btn-sm btn-warning">Perbarui</a></a></td>
            </tr>
        </tbody>
        <?php }?>
    </table>
</div>