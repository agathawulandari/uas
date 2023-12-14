<?php 
    // panggil id karyawan
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna ='".$id."'");
    $d = mysqli_fetch_array($data);
?>

<h2>Hapus Data Karyawan</h2>

<div class="row mt-5">
    <div class="col-md-6">
        <div class="card card-body">
            Anda yakin akan menghapus data karyawan atas nama <b><?php echo $d['nama_pengguna']; ?></b>

            <form action="karyawan-aksi.php" method="post">
                <input type="hidden" name="id_pengguna" value="<?php echo $d['id_pengguna']; ?>">

                <button type="submit" class="btn btn-primary mt-4" name="hapus-karyawan">Hapus Data</button>
                <a href="?page=data-karyawan" class="btn btn-secondary mt-4">Batal</a>
            </form>
        </div>
    </div>
</div>