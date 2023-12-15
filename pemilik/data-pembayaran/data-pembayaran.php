<h2 class="text-center mt-5">Data Pembayaran</h2>


<div class="row mt-5">
    <div class="col-md-12">

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
                        <th>Jumlah Raket</th>
                        <th>Harga Raket</th>
                        <th>Metode Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Sub Total Kategori</th>
                        <th>Sub Total Raket</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT 
                            pengguna.nama_pengguna,
                            lapangan.nama_lapangan,
                            kategori.nama_kategori,
                            kategori.harga_kategori,
                            pemesanan_lapangan.durasi,
                            pemesanan_lapangan.tgl_booking,
                            pemesanan_lapangan.jam_booking,
                            pemesanan_raket.jml_raket,
                            pemesanan_raket.harga_raket,
                            pembayaran.metode_pembayaran,
                            pembayaran.status_pembayaran,
                            pembayaran.bukti_bayar,
                            pembayaran.tgl_transfer,
                            pemesanan_lapangan.total_harga_lapangan,
                            pemesanan_raket.total_harga_raket,
                            pembayaran.total_pembayaran
                        FROM 
                            pembayaran
                            LEFT JOIN pengguna ON pembayaran.id_pengguna = pengguna.id_pengguna
                            LEFT JOIN pemesanan_lapangan ON pembayaran.id_pemesanan = pemesanan_lapangan.id_pemesanan
                            LEFT JOIN pemesanan_raket ON pembayaran.id_raket = pemesanan_raket.id_raket
                            LEFT JOIN lapangan ON pemesanan_lapangan.id_lapangan = lapangan.id_lapangan
                            LEFT JOIN kategori ON lapangan.id_kategori = kategori.id_kategori

                    ");
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
                            <td><?php echo $d['jml_raket']; ?></td>
                            <td><?php echo $d['harga_raket']; ?></td>
                            <td><?php echo $d['metode_pembayaran']; ?></td>
                            <td><?php echo $d['status_pembayaran']; ?></td>
                            <td><?php echo $d['bukti_bayar']; ?></td>
                            <td><?php echo $d['tgl_transfer']; ?></td>
                            <td><?php echo $d['total_harga_lapangan']; ?></td>
                            <td><?php echo $d['total_harga_raket']; ?></td>
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