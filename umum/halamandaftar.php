
<div class="container mt-5">
    <div class="row">
        <h2 class="text-center">Daftar</h2>
        <form action="register.php" method="post">
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
                <input type="text" name="email" class="form-control" placeholder="Isikan Email">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password   :</label>
                <input type="password" name="password" class="form-control" placeholder="Isikan Password">
            </div>
            <div class="form-group mb-3">
                <label for="telp">Telpon   :</label>
                <input type="text" name="telp" class="form-control" placeholder="Isikan Nomor Telpon">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="register">Daftar</button>
            <button type="reset" class="btn btn-secondary mb-3">Reset</button>
        </form>
        <h6 class="text-center">Sudah Punya Akun?</h6>
        <h6 class="text-center"><a href="?page=halamanmasuk">Klik disini untuk masuk</a></h6>
    </div>
</div>