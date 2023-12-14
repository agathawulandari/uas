<?php 
    // panggil id karyawan
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna ='".$id."'");
    $d = mysqli_fetch_array($data);
?>

<h2 class="text-center mt-5">Hapus Data Karyawan</h2>
    <div class="card text-center mt-5">
        <div class="card-header">
            <h3 class="text-danger"> Pemberitahuan !! </h3>
        </div>
        <div class="card-body mt-5 mb-5">
            <p>Anda yakin akan menghapus data karyawan atas nama <b class="text-danger"><?php echo $d['nama_pengguna']; ?></b></p>
        </div>
        <div class="card-footer">
        <form action="data-karyawan/karyawan-aksi.php" method="post">

            <input type="hidden" name="id_pengguna" value="<?php echo $d['id_pengguna'];?>">

            <button type="submit" class="btn btn-outline-primary" name="hapus-karyawan">Hapus</button>
            <a href="?page=data-karyawan" class="btn btn-outline-secondary">Kembali</a>

        </form>
        </div>
    </div>  