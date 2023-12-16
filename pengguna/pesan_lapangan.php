<?php 
    if (isset($_SESSION["username"])){
        $user = $_SESSION["username"];
    include("../koneksi.php");
    //mengambil id_kategori dan id_lapangan dari url
    $kategori_url  = isset($_GET['kategori']) ? $_GET['kategori'] :'';
    $lapangan_url  = isset($_GET['lapangan']) ? $_GET['lapangan'] :'';
    
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
?>
<header>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal text-body-emphasis">Pesan</h1>
        <p class="fs-5 text-body-secondary">Silahkan isi from pemesanan lapangan</p>
    </div>
</header>

<body>
    <div class="container">
        <form action="proses_pesan.php" method="post">
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
            <div class="col-12">
                <label for="harga" class="form-label">Harga Lapangan</label>
                <input type="text" class="form-control" id="harga" name="harga" p   laceholder=""
                    value="<?php echo $kategori['harga_kategori'] ?>" required disabled>
                <input type="hidden" class="form-control" id="harga_kategori" name="harga_kategori"
                    value="<?php echo $kategori['harga_kategori'] ?>">
            </div>
            <hr>
            <div class="col-12">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder=""
                    value="Isikan Tanggal bermain" required>
            </div>
            <div class="col-12">
                <label for="jam" class="form-label">Jam Booking</label>
                <input type="time" class="form-control" id="jam" name="jam" placeholder="Isikan Jam Booking bermain"
                    value="" required>
            </div>
            <div class="col-12">
                <label for="durasi" class="form-label">Durasi</label>
                <input type="time" class="form-control" id="durasi" name="durasi" placeholder="Isiskan durasi bermain"
                    value="" required>
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary" name="pesan_lapangan">Pesan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=tipe" class="btn btn-danger">Batal</a>
            </div>

        </form>
    </div>
</body>
<?php } else {
    header('location:../umum/index.php?page=home');
    exit();
    }  
?>