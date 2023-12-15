<h2 class="text-center mt-5">Data Pembayaran</h2>


<div class="row mt-5">
    <div class="col-md-12">
        <div class="col-md-6">
            <!-- action="data-anggota/anggota-aksi.php" -->
            <form class="d-flex" role="search" method="post">
                <input class="form-control me-2" type="search" name="tcari-data" placeholder="Masukkan Nama Pengguna / Username" aria-label="Search" value="<?php echo isset($_POST['tcari-data']) ? htmlspecialchars($_POST['tcari-data']) : ''; ?>">

                <button class="btn btn-outline-success" type="submit" name="cari-data">Cari</button>
                <a href="?page=data-pembayaran" class="btn btn-outline-danger">Batal</a>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="table table-bordered mt-2 text">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Anggota</th>
                        <th>Nama Lapangan</th>
                        <th>Nama Kategori</th>
                        <th>Harga Kategori</th>
                        <th>Durasi</th>
                        <th>Tanggal Booking</th>
                        <th>Jam Booking</th>
                        <th>Metode Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Buat Pembayaran</th>
                        <th>Sub Total Kategori</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;

                    // untuk cari data
                    if(isset($_POST['cari-data'])){
                        $tcari_data = $_POST['tcari-data'];

                        $sql = "SELECT 
                                    pengguna.nama_pengguna,
                                    lapangan.nama_lapangan,
                                    kategori.nama_kategori,
                                    kategori.harga_kategori,
                                    pemesanan_lapangan.durasi,
                                    pemesanan_lapangan.tgl_booking,
                                    pemesanan_lapangan.jam_booking,
                                    pembayaran.metode_pembayaran,
                                    pembayaran.status_pembayaran,
                                    pembayaran.bukti_bayar,
                                    pembayaran.created_at,
                                    pemesanan_lapangan.total_harga,
                                    pembayaran.total_pembayaran
                                FROM 
                                    pembayaran
                                    LEFT JOIN pengguna ON pembayaran.id_pengguna = pengguna.id_pengguna
                                    LEFT JOIN pemesanan_lapangan ON pembayaran.id_pemesanan = pemesanan_lapangan.id_pemesanan
                                    LEFT JOIN lapangan ON pemesanan_lapangan.id_lapangan = lapangan.id_lapangan
                                    LEFT JOIN kategori ON lapangan.id_kategori = kategori.id_kategori
                                WHERE
                                    (pengguna.nama_pengguna LIKE '%$tcari_data%' OR pengguna.username LIKE '%$tcari_data%')
                                ORDER BY pengguna.nama_pengguna ASC";
                    } else {
                        // Query tanpa pencarian
                        $sql = "SELECT 
                                    pengguna.nama_pengguna,
                                    lapangan.nama_lapangan,
                                    kategori.nama_kategori,
                                    kategori.harga_kategori,
                                    pemesanan_lapangan.durasi,
                                    pemesanan_lapangan.tgl_booking,
                                    pemesanan_lapangan.jam_booking,
                                    pembayaran.metode_pembayaran,
                                    pembayaran.status_pembayaran,
                                    pembayaran.bukti_bayar,
                                    pembayaran.created_at,
                                    pemesanan_lapangan.total_harga,
                                    pembayaran.total_pembayaran
                                FROM 
                                    pembayaran
                                    LEFT JOIN pengguna ON pembayaran.id_pengguna = pengguna.id_pengguna
                                    LEFT JOIN pemesanan_lapangan ON pembayaran.id_pemesanan = pemesanan_lapangan.id_pemesanan
                                    LEFT JOIN lapangan ON pemesanan_lapangan.id_lapangan = lapangan.id_lapangan
                                    LEFT JOIN kategori ON lapangan.id_kategori = kategori.id_kategori
                                ORDER BY pengguna.nama_pengguna ASC";
                    }

                    $data = mysqli_query($koneksi, $sql );
                    while ($d = mysqli_fetch_array($data)) {

                    ?>

                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['nama_pengguna']; ?></td>
                            <td><?php echo $d['nama_lapangan']; ?></td>
                            <td><?php echo $d['nama_kategori']; ?></td>
                            <td><?php echo $d['harga_kategori']; ?></td>
                            <td><?php echo $d['durasi']; ?></td>
                            <td><?php echo $d['tgl_booking']; ?></td>
                            <td><?php echo $d['jam_booking']; ?></td>
                            <td><?php echo $d['metode_pembayaran']; ?></td>
                            <td><?php echo $d['status_pembayaran']; ?></td>
                            <td><?php echo $d['bukti_bayar']; ?></td>
                            <td><?php echo $d['created_at']; ?></td>
                            <td><?php echo $d['total_harga']; ?></td>
                            <td><?php echo $d['total_pembayaran']; ?></td>
                        </tr>

                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>