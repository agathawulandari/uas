<div class="container">
    <div class="py-5 text-center">
        <h2>Daftar</h2>
    </div>

    <div class="row">
        <form action="login.php" method="post">
            <div class="form-group mb-3">
                <label for="username">Username   :</label>
                <input type="text" name="username" class="form-control" placeholder="Isikan Username">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password   :</label>
                <input type="password" name="password" class="form-control" placeholder="Isikan Password">
            </div>
            <div class="form-group mb-3">
                <label>Tentukan Tipe   :</label>
                <select name="tipe" class="form-control">
                    <option selected disabled>--Pilih Tipe--</option>
                    <option value="1">Pemilik</option>
                    <option value="2">Karyawan</option>
                    <option value="3">Pengguna</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
        <h6 class="text-center">Belum Punya Akun?</h6>
        <h6 class="text-center"><a href="?page=halamandaftar">Klik disini untuk daftar</a></h6>
    </div>
</div>  