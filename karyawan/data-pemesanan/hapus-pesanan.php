<?php 
    $user = $_GET['user'];
    $datatabel = "SELECT * FROM pengguna where id_pengguna = '".$user."' and tipe_akses = '3'";
    $hasiltabel = mysqli_query($koneksi, $datatabel);
    $tabel = mysqli_fetch_array($hasiltabel);
?>

<h2 class="mt-5 text-center">Hapus Data Pengguna</h2>
<div class="container mt-5">
    <!-- Anda yakin akan menghapus data karyawan atas nama <b><?php echo $tabel['nama_pengguna']; ?></b>
    <input type="hidden" name="no_karyawan" value="<?php echo $tabel['id_pengguna'];?>">
    <button type="submit" class="btn btn-primary" name="hapus_karyawan">Hapus Data</button>
    <a href="?page=data-karyawan" class="btn btn-secondary mt-5 mb-5">Batal</a> -->

    <div class="card text-center">
        <div class="card-header">
            Pemberitahuan
        </div>
        <div class="card-body">
            <h5 class="card-text mb-4 mt-4">Anda yakin akan menghapus data karyawan atas nama <b><?php echo $tabel['nama_pengguna']; ?></b></h5>
            <form action="data-pengguna/proses-pengguna.php" method="post">
                <!-- <h5 class="card-title">Hapus Data Pengguna</h5> -->
                <input type="hidden" name="id_pengguna" value="<?php echo $tabel['id_pengguna'];?>">
                <button type="submit" class="btn btn-primary" name="hapus_pengguna">Hapus Data</button>
                <a href="?page=data-pengguna" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>