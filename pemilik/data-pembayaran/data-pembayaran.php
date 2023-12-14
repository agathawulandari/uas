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
                        $no=1;
                        $data = mysqli_query($koneksi, "SELECT * FROM pengguna, lapangan, kategori, pembayaran, pemesanan_lapangan, pemesanan_raket WHERE tipe_akses=3");
                        while ($d = mysqli_fetch_array($data)){
            
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
                        <td><?php echo $d['bukti_Pembayaran']; ?></td>
                        <td><?php echo $d['tgl_transfer']; ?></td>
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