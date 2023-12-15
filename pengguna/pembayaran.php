<?php 
include('../koneksi.php');
// $kategori  = isset($_GET['kategori']) ? $_GET['kategori'] :'';
if (isset($_SESSION["username"])){
        $user = $_SESSION["username"];


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
<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h2>Pembayaran</h2>
        <p class="lead">Mohon untuk dibayar yaaaaa</p>
    </div>

    <div class="">
        <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna"
            value="<?php echo $username ['id_pengguna']; ?>" required disabled>
        <table class="table table-dark table-striped">
            <tr>
                <td>No</td>
                <td>Kategori</td>
                <td>Nomor Lapangan</td>
                <td>Tanggal Booking</td>
                <td>Jam Booking</td>
                <td>Durasi</td>
                <td>Harga</td>
                <td>Status pembayaran</td>
                <td colspan="3">Aksi</td>
            </tr>
            <?php 
              
            $data = mysqli_query($koneksi, "SELECT * FROM  pemesanan_lapangan where id_pengguna");
            
            while ($d = mysqli_fetch_array($data)) {
                if ($username ['id_pengguna'] == $d['id_pengguna']) {
        
            $no = 1;
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d['id_kategori'] ?></td>
                <td><?php echo $d['id_lapangan'] ?></td>
                <td><?php echo $d['tgl_booking'] ?></td>
                <td><?php echo $d['jam_booking'] ?></td>
                <td><?php echo $d['durasi'] ?></td>
                <td><?php ?></td>
                <td><?php ?></td>
                <td><a href="?page=bukti_bayar&kategori=<?php echo $d ['id_kategori'] ?>&lapangan=<?php echo $d ['id_lapangan'] ?>&pemesanan=<?php echo $d ['id_pemesanan'] ?>"
                        class="btn btn-sm btn-warning w-100">Bayar</a>
                </td>
                <!-- <td><a href="?page=bukti_bayar" class="btn btn-sm btn-warning w-100">Bayar</a></td> -->
            </tr>
            <?php 
        }
    }

        ?>
        </table>
    </div>
</div>
<?php 
} else {
    header('location:../umum/index.php?page=home');
    exit();
    }  

?>