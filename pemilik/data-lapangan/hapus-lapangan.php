<?php 

// panggil id karyawan
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM lapangan, kategori WHERE id_lapangan ='".$id."' AND lapangan.id_kategori=kategori.id_kategori");
$d = mysqli_fetch_array($data);

?>

<h2 class="text-center mt-5">Hapus Data Lapangan</h2>
    <div class="card text-center mt-5">
        <div class="card-header">
            <h3 class="text-danger"> Pemberitahuan !! </h3>
        </div>
        <div class="card-body mt-5 mb-5">
            <p>Anda yakin akan menghapus data lapangan <b class="text-danger"><?php echo $d['nama_lapangan']; ?></b></p>
        </div>
        <div class="card-footer">
        <form action="data-lapangan/lapangan-aksi.php" method="post">

            <input type="hidden" name="id_lapangan" value="<?php echo $d['id_lapangan'];?>">
            <input type="hidden" name="id_kategori" value="<?php echo $d['id_kategori'];?>">

            <button type="submit" class="btn btn-outline-primary" name="hapus-lapangan">Hapus</button>
            <a href="?page=data-lapangan" class="btn btn-outline-secondary">Kembali</a>

        </form>
        </div>
    </div>  