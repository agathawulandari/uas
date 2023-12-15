<?php 
    $lap = $_GET['lapangan'];
    $kat = $_GET['kategori'];

    $datalapangan = "SELECT lapangan.*, kategori.nama_kategori, kategori.harga_kategori FROM lapangan LEFT JOIN kategori ON lapangan.id_kategori = kategori.id_kategori where lapangan.id_lapangan = '".$lap."' AND kategori.id_kategori= '".$kat."'" ;
    $hasillap = mysqli_query($koneksi, $datalapangan);
    $lapangan = mysqli_fetch_array($hasillap);
?>


<div class="container mt-5">
    <div class="row">
        <h2 class="text-center mb-5">Tambah Pesanan</h2>
        <div class="col-md-8">
            <form action="data-pemesanan/proses-pesanan.php" method="post">
                <!-- <div class="mb-2" required>
                    <label>
                        <input type="radio" name="pilihanakun" value="Ada" onclick="showSelect()"> Punya Akun
                    </label>
                    <label>
                        <input type="radio" name="pilihanakun" value="Tidak" onclick="hideSelect()"> Tidak Punya Akun
                    </label>
                </div>

                <div id="select_pengguna" class="visually-hidden mb-2">
                    <label for="nama_pengguna">Nama Pengguna   :</label>
                    <select name="id_pengguna" class="form-control">
                        <option disabled selected>Pilih Pengguna</option>
                            <?php 
                                // $data1 = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE tipe_akses = 3");
                                // while($d1 = mysqli_fetch_array($data1)){
                            ?>
                        <option value="<?= $d1['id_pengguna']?>"><?= $d1['nama_pengguna'];?> | <?= $d1['username']?></option>
                        <?php ?>
                    </select>
                </div> -->
                
                <div id="input_pengguna" class="mb-2">
                    <div class="mb-2">
                        <label for="nama_pengguna">Nama Pengguna :</label>
                        <input type="text" name="id_pengguna_input" class="form-control" placeholder="Isikan nama">
                    </div>
                </div>
                
                <div class="form-group mb-3">
                    <label for="lapangan">Lapangan   :</label>
                    <input type="hidden" name="id_lapangan" value="<?php echo $lapangan['id_lapangan'];?>">
                    <input type="text" name="nama_lapangan" class="form-control" value="<?= $lapangan['nama_lapangan']?>" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="lapangan">Kategori   :</label>
                    <input type="hidden" name="id_kategori" value="<?php echo $lapangan['id_kategori'];?>">
                    <input type="text" name="nama_kategori" class="form-control" value="<?= $lapangan['nama_kategori']?>" disabled>
                </div>
                <div class="mb-2">
                    <label for="nama_pengguna">Harga :</label>
                    <input type="text" name="harga" class="form-control" value="<?= $lapangan['harga_kategori']?>" disabled>
                    <input type="hidden" name="harga_lapangan" value="<?= $lapangan['harga_kategori']?>">
                </div>
                <div class="form-group mb-3">
                    <label for="lapangan">Tanggal Booking   :</label>
                    <input type="date" name="tanggal_booking" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="lapangan">Jam Booking   :</label>
                    <input type="time" name="jam_booking" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="lapangan">Durasi   :</label>
                    <input type="time" name="durasi" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mb-3" name="tambah_pesanan">Tambah</button>
                <button type="reset" class="btn btn-secondary mb-3">Reset</button>
                <a href="?page=data-pengguna" class="btn btn-danger mb-3">Batal</a>
            </form>
        </div>
        <div class="col-md-4">
            <p>Informasi Kategori</p>
            <?php 
                $lapangan = mysqli_query($koneksi, "SELECT * FROM kategori");
                while($lap = mysqli_fetch_array($lapangan)){
            ?>
                <div class="card" style="width: 25rem;margin-bottom: 7px;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $lap['nama_kategori'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Rp <?= $lap['harga_kategori'] ?></h6>
                        <p class="card-text"><?= $lap['deskripsi'] ?></p>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>

<script>
    function showSelect() {
        document.getElementById('select_pengguna').classList.remove('visually-hidden');
        document.getElementById('input_pengguna').classList.add('visually-hidden');
    }

    function hideSelect() {
        document.getElementById('select_pengguna').classList.add('visually-hidden');
        document.getElementById('input_pengguna').classList.remove('visually-hidden');
    }
</script>