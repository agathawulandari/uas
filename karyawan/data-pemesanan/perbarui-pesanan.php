<?php 
    $pesanan = $_GET['pesanan'];

    $datatabel = "SELECT 
        pemesanan_lapangan.*, 
        pengguna.username, 
        lapangan.nama_lapangan,
        kategori.nama_kategori,
        kategori.harga_kategori
        FROM pemesanan_lapangan 
        LEFT JOIN pengguna ON pemesanan_lapangan.id_pengguna = pengguna.id_pengguna 
        LEFT JOIN lapangan ON pemesanan_lapangan.id_lapangan = lapangan.id_lapangan
        LEFT JOIN kategori ON pemesanan_lapangan.id_kategori = kategori.id_kategori
        where id_pemesanan = '".$pesanan."' ";
    $hasiltabel = mysqli_query($koneksi, $datatabel);
    $tabel = mysqli_fetch_array($hasiltabel);
?>

<div class="container mt-5">
    <div class="row">
        <h2 class="text-center mb-5">Edit Nota <?= $tabel['id_pemesanan']?></h2>
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
        <form action="data-pemesanan/proses-pesanan.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <input type="hidden" name="id_pesanan" value="<?php echo $tabel['id_pemesanan'];?>">
                        <label for="nama_pengguna">Nomor Pesanan   :</label>
                        <input type="text" name="nama_pesanan" class="form-control" required value="<?php echo $tabel['id_pemesanan']??null;?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pengguna">Nama Pemesan   :</label>
                        <input type="text" name="nama_pemesan" class="form-control" required value="<?php echo $tabel['username']??$tabel['id_pengguna'];?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="lapangan">Lapangan   :</label>
                        <input type="text" name="nama_lapangan" class="form-control" required value="<?php echo $tabel['nama_lapangan']??null;?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="kategori">Kategori   :</label>
                        <input type="text" name="nama_lapangan" class="form-control" required value="<?php echo $tabel['nama_kategori']??null;?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="harga">Harga   :</label>
                        <input type="text" name="harga_lapangan" class="form-control" required value="Rp <?php echo $tabel['harga_kategori']??'0'?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="telp">Status   :</label>
                        <input type="text" name="telp" class="form-control" required value="<?php echo $tabel['telp']??null;?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="telp">Tanggal Booking   :</label>
                        <input type="date" name="tgl_booking" class="form-control" required value="<?php echo $tabel['tgl_booking']??null;?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="mulai">Jam Booking   :</label>
                        <input type="time" name="jam_mulai" class="form-control" required value="<?php echo $tabel['jam_booking']??null;?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="selesai">Jam Selesai   :</label>
                        <input type="time" name="jam_selesai" class="form-control" required value="<?php echo $tabel['jam_habis']?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="total">Durasi   :</label>
                        <input type="text" name="durasi" class="form-control" required value="<?php echo $tabel['durasi']?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="total">Total Harga   :</label>
                        <input type="text" name="total_harga" class="form-control" required value="<?php echo $tabel['total_harga']?>" disabled>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="perbarui_pengguna">Perbarui</button>
            <a href="?page=data-pengguna" class="btn btn-secondary mb-3">Batal</a>
        </form>
    </div>
</div>