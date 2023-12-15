<?php 
include('../koneksi.php');
$kategori  = isset($_GET['kategori']) ? $_GET['kategori'] :'';
?>
<div class="container">
    <header>
        <div class="pricing-header py-5 text-center">
            <h2 class="text-body-emphasis">Jadwal Lapangan</h2>
            <p class="fs-5 text-body-secondary"></p>
        </div>
    </header>
    <table class="table table-striped">
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
            $data = mysqli_query($koneksi, "SELECT
                pemesanan_lapangan.*,
                kategori.nama_kategori,
                lapangan.nama_lapangan 
            FROM
                pemesanan_lapangan
                LEFT JOIN kategori ON pemesanan_lapangan.id_kategori = kategori.id_kategori
                LEFT JOIN lapangan ON pemesanan_lapangan.id_lapangan = lapangan.id_lapangan");
            
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            if ($d['id_kategori'] == $kategori) {
            ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $d['id_pengguna'] ?></td>
            <td><?php echo $d['nama_kategori'] ?></td>
            <td><?php echo $d['nama_lapangan'] ?></td>
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