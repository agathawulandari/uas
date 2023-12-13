<div class="container mt-5">
    <div class="row">
        <h2 class="text-center">Tambah Pengguna</h2>
        <form action="data-pengguna/proses-pengguna.php" method="post">
            <div class="form-group mb-3">
                <label for="nama_pengguna">Nama Pengguna   :</label>
                <input type="text" name="nama_pengguna" class="form-control" placeholder="Isikan Nama Lengkap">
            </div>
            <div class="form-group mb-3">
                <label for="username">Username   :</label>
                <input type="text" name="username" class="form-control" placeholder="Isikan Username">
            </div>
            <div class="form-group mb-3">
                <label for="email">Email   :</label>
                <input type="email" name="email" class="form-control" placeholder="Isikan Email">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password   :</label>
                <input type="password" name="password" class="form-control" placeholder="Isikan Password">
            </div>
            <div class="form-group mb-3">
                <label for="telp">Telpon   :</label>
                <input type="text" name="telp" class="form-control" placeholder="Isikan Nomor Telpon">
            </div>
            <div class="form-group mb-3">
                <label for="alamat">Alamat   :</label>
                <textarea type="text" name="alamat" class="form-control" placeholder="Isikan Alamat"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="tambah_pengguna">Tambah</button>
            <button type="reset" class="btn btn-secondary mb-3">Reset</button>
            <a href="?page=data-pengguna" class="btn btn-danger mb-3">Batal</a>
        </form>
    </div>
</div>