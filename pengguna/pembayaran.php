<?php 
include('../koneksi.php');
// $kategori  = isset($_GET['kategori']) ? $_GET['kategori'] :'';
if (isset($_SESSION["username"])){
        $user = $_SESSION["username"];

    $database_pengguna = "SELECT * FROM pengguna where username = '$user'";
    $pengguna = mysqli_query($koneksi, $database_pengguna);
    $username = mysqli_fetch_array($pengguna);
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
                <td><a href="" class="btn btn-sm btn-warning w-100">Bayar</a></td>
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