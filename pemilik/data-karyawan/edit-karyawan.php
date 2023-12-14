<?php 
    // panggil id karyawan
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna ='".$id."'");
    $d = mysqli_fetch_array($data);
?>

<h2 class="text-center mt-5">Edit Data Karyawan</h2>

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

        <form action="data-karyawan/karyawan-aksi.php" method="post">

            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="hidden" name="id_pengguna" value="<?php echo $tabel['id_pengguna'];?>">
                <input type="text" name="nama_pengguna" class="form-control mt-2" required placeholder="Nama Karyawan" value="<?php echo $d['nama_pengguna'] ??null;  ?>" >
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control mt-2" required placeholder="Username" value="<?php echo $d['username'] ?? null; ?>" >
            </div>
            <div class="form-group">
                <label class="mt-2">Nomor Telepon</label>
                <input type="text" name="telp" class="form-control mt-2" required placeholder="Nomor Telepon" value="<?php echo $d['telp'] ?? null; ?>">
            </div>
            <div class="form-group">
                <label class="mt-2">Alamat Email</label>
                <input type="text" name="email" class="form-control mt-2" required placeholder="Alamat Email" value="<?php echo $d['email'] ?? null; ?>">
            </div>
            <div class="form-group">
                <label class="mt-2">Alamat</label>
                <textarea name="alamat" class="form-control mt-2" required placeholder="Alamat"><?php echo $d['alamat'] ??null; ?></textarea>
            </div>
            <?php 
                $tipe = $d['tipe_akses'] ??null;
                if ($tipe==1) {
                    $namatipe = 'Pemilik';
                } else if ($tipe==2) {
                    $namatipe = 'Karyawan';
                } else {
                    $namatipe = 'Pengguna';
                }
            ?>
            <div class="form-group mb-5 mt-2">
                <label for="telp">Tipe   :</label>
                <input type="text" class="form-control" value="<?php echo $namatipe;?>" disabled>
                <input type="hidden" name="tipe" value="<?php echo $namatipe;?>">
            </div>

            <button type="submit" class="btn btn-outline-primary mb-5" name="edit-karyawan">Edit</button>
            <button type="reset" class="btn btn-outline-danger mb-5">Batal</button>
            <a href="?page=data-karyawan" class="btn btn-outline-secondary mb-5">Kembali</a>

        </form>
    </div>
</div>