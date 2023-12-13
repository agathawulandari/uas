<?php 
    $user = $_GET['user'];
    $datatabel = "SELECT * FROM pengguna where username = '".$user."' and tipe_akses = '3'";
    $hasiltabel = mysqli_query($koneksi, $datatabel);
    $tabel = mysqli_fetch_array($hasiltabel);
?>

<div class="container mt-5">
    <div class="row">
        <h2 class="text-center">Edit</h2>
        <form action="register.php" method="post">
            <div class="form-group mb-3">
                <label for="nama_pengguna">Nama Pengguna   :</label>
                <input type="text" name="nama_pengguna" class="form-control" value="<?php echo $tabel['nama_pengguna']??null;?>">
            </div>
            <div class="form-group mb-3">
                <label for="username">Username   :</label>
                <input type="text" name="username" class="form-control" value="<?php echo $tabel['username']??null;?>">
            </div>
            <div class="form-group mb-3">
                <label for="email">Email   :</label>
                <input type="text" name="email" class="form-control" value="<?php echo $tabel['email']??null;?>">
            </div>
            <div class="form-group mb-3">
                <label for="telp">Telpon   :</label>
                <input type="text" name="telp" class="form-control" value="<?php echo $tabel['telp']??null;?>">
            </div>
            <?php 
            
            $tipe = $tabel['tipe_akses'];
            if ($tipe==1) {
                $namatipe = 'Pemilik';
            } else if ($tipe==2) {
                $namatipe = 'Karyawan';
            } else {
                $namatipe = 'Pengguna';
            }
            ?>
            <div class="form-group mb-3">
                <label for="telp">Tipe   :</label>
                <input type="text" class="form-control" value="<?php echo $namatipe;?>" disabled>
                <input type="hidden" name="telp" value="<?php echo $namatipe;?>">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="perbarui">Perbarui</button>
            <a href="?page=data-pengguna" class="btn btn-secondary mb-3">Batal</a>
        </form>
    </div>
</div>