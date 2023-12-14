<?php 
include('../koneksi.php');
$kategori  = isset($_GET['kategori']) ? $_GET['kategori'] :'';
?>
<div class="container">
    <header>
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal text-body-emphasis">Jadwal Lapangan</h1>
            <p class="fs-5 text-body-secondary"></p>
        </div>
    </header>
    <table class="table table-dark table-striped">
        <tr>
            <td>No</td>
            <td>Nama Pemesan</td>
            <td>Kategori</td>
            <td>Nomor Lapangan</td>
            <td>Tanggal Booking</td>
            <td>Jam Booking</td>
            <td>Durasi</td>
        </tr>
        <?php 
        $kategori = $_GET['kategori'];            
            $data = mysqli_query($koneksi, "SELECT * FROM  pemesanan_lapangan");
            
            while ($d = mysqli_fetch_array($data)) {
            if ($d['id_kategori'] == $kategori) {
            $no = 1;
            ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $d['id_pengguna'] ?></td>
            <td><?php echo $d['id_kategori'] ?></td>
            <td><?php echo $d['id_lapangan'] ?></td>
            <td><?php echo $d['tgl_booking'] ?></td>
            <td><?php echo $d['jam_booking'] ?></td>
            <td><?php echo $d['durasi'] ?></td>
        </tr>
        <?php 
        }
    }
        ?>
    </table>
</div>