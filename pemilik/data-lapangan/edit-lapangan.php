<?php 

// panggil id karyawan
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM lapangan, kategori WHERE id_lapangan ='".$id."' AND lapangan.id_kategori=kategori.id_kategori");
$d = mysqli_fetch_array($data);

?>

<h2 class="text-center mt-5">Edit Data Lapangan</h2>

<div class="row mt-4">
    <div class="col">

        <?php 
            if (isset($_SESSION['alertClass']) && isset($_SESSION['message'])) {
                $alertClass = $_SESSION['alertClass'];
                $message = $_SESSION['message'];
            
                echo '<div class="alert ' . $alertClass . ' alert-dismissible fade show" role="alert">
                        ' . $message . '
                        </div>';
                
                unset($_SESSION['alertClass']);
                unset($_SESSION['message']);
            }
        ?>

        <form action="data-lapangan/lapangan-aksi.php" method="post">
            <div class="form-group">
                <label>Nama Lapangan</label>
                <input type="hidden" name="id_lapangan" value="<?php echo $d['id_lapangan'];?>">
                <input type="hidden" name="id_kategori" value="<?php echo $d['id_kategori'];?>">
                <input type="text" name="nama_lapangan" class="form-control mt-2" placeholder="Nama Lapangan" value="<?php echo $d['nama_lapangan']; ?>" >
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="nama_kategori" class="form-control mt-2" placeholder="Kategori" value="<?php echo $d['nama_kategori']; ?>" >
            </div>
            <div class="form-group">
                <label class="mt-2">Deskripsi</label>
                <textarea name="deskripsi" class="form-control mt-2" placeholder="Deskripsi"><?php echo $d['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label class="mt-2">Harga</label>
                <input type="text" name="harga" class="form-control mt-2 mb-5" placeholder="Harga" value="<?php echo $d['harga_kategori']; ?>" >
            </div>

            <button type="submit" class="btn btn-outline-primary mb-5" name="edit-lapangan">Edit</button>
            <button type="reset" class="btn btn-outline-danger mb-5">Batal</button>
            <a href="?page=data-lapangan" class="btn btn-outline-secondary mb-5">Kembali</a>

        </form>
    </div>
</div>