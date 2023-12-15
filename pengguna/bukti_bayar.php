<?php 
    if (isset($_SESSION["username"])){
        $user = $_SESSION["username"];
    include("../koneksi.php");
    //mengambil id_kategori dan id_lapangan dari url
    $kategori_url  = isset($_GET['kategori']) ? $_GET['kategori'] :'';
    $lapangan_url  = isset($_GET['lapangan']) ? $_GET['lapangan'] :'';
    $pemesanan_url  = isset($_GET['pemesanan']) ? $_GET['pemesanan'] :'';
    
    //mengambil data pengguna
    $database_pengguna = "SELECT * FROM pengguna where username = '$user'";
    $pengguna = mysqli_query($koneksi, $database_pengguna);
    $username = mysqli_fetch_array($pengguna);

    //mengambil data kategori
    $database_kategori = "SELECT * FROM kategori where id_kategori = '$kategori_url'";
    $kategori_query = mysqli_query($koneksi, $database_kategori);
    $kategori = mysqli_fetch_array($kategori_query);
    
    //mengambil data lapangan
    $database_lapangan = "SELECT * FROM lapangan where id_lapangan = '$lapangan_url'";
    $lapangan_query = mysqli_query($koneksi, $database_lapangan);
    $lapangan = mysqli_fetch_array($lapangan_query);
    
    //mengambil data pemesanan
    $database_pemesanan = "SELECT * FROM pemesanan_lapangan where id_pemesanan = '$pemesanan_url'";
    $pemesanan_query = mysqli_query($koneksi, $database_pemesanan);
    $pemesanan = mysqli_fetch_array($pemesanan_query);
?>
<header>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal text-body-emphasis">Bayar</h1>
        <p class="fs-5 text-body-secondary">Silahkan masukan bukti pembayaran</p>
    </div>
</header>

<body>
    <div class="container">
        <form action="proses_pesan.php" method="post">
            <div class="col-12">
                <label for="id_pemesanan" class="form-label">Nomor Pemesanan</label>
                <input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" placeholder=""
                    value="<?php echo $pemesanan ['id_pemesanan']; ?>" required disabled>
                <input type="hidden" class="form-control" id="id_pemesanan" name="id_pemesanan" placeholder=""
                    value="<?php echo $pemesanan ['id_pemesanan']; ?>" required>
            </div>
            <div class="col-12">
                <label for="id_raket" class="form-label">Pemesanan Raket</label>
                <input type="text" class="form-control" id="id_raket" name="id_raket" placeholder="" value="0" required
                    disabled>
                <input type="hidden" class="form-control" id="id_raket" name="id_raket" placeholder="" value="0"
                    required>
            </div>
            <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder=""
                    value="<?php echo $username ['username']; ?>" required disabled>
                <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna"
                    value="<?php echo $username ['id_pengguna']; ?>" required>
            </div>
            <div class="col-12">
                <label for="lapangan" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" placeholder=""
                    value="<?php echo $kategori['nama_kategori'] ?>" required disabled>
                <input type="hidden" class="form-control" id="id_kategori" name="id_kategori"
                    value="<?php echo $kategori['id_kategori'] ?>">
            </div>
            <div class="col-12">
                <label for="lapangan" class="form-label">Lapangan</label>
                <input type="text" class="form-control" id="lapangan" name="lapangan" placeholder=""
                    value="<?php echo $lapangan['nama_lapangan'] ?>" required disabled>
                <input type="hidden" class="form-control" id="id_lapangan" name="id_lapangan"
                    value="<?php echo $lapangan['id_lapangan'] ?>">
            </div>
            <hr>
            <div class="col-12">
                <label for="metode_pembayaran" class="form-label">Metode pembayaran</label>
                <input type="text" class="form-control" id="metode_pembayaran" name="metode_pembayaran" placeholder=""
                    value="Transfer" required disabled>
                <input type="hidden" class="form-control" id="metode_pembayaran" name="metode_pembayaran" placeholder=""
                    value="Transfer" required>
                <input type="hidden" class="form-control" id="status_pembayaran" name="status_pembayaran" placeholder=""
                    value="Lunas" required>
                <input type="text" class="form-control mt-2" id="metode" name="metode" placeholder=""
                    value="BRI | 8849583457" required disabled>
            </div>

            <div class="col-12">
                <label for="bukti_bayar" class="form-label">Bukti Bayar</label>
                <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control">
                <input type="hidden" name="bukti_bayar_path" id="bukti_bayar_path" value="">
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary" name="bukti">Pesan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=pembayaran" class="btn btn-danger">Batal</a>
            </div>

        </form>
    </div>
</body>
<?php } else {
    header('location:../umum/index.php?page=home');
    exit();
    }  
?>