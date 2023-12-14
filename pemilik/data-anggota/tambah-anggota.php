<h2 class="text-center mt-5">Tambah Data Anggota</h2>

<div class="row mt-4">
    <div class="col">
        <form action="data-anggota/anggota-aksi.php" method="post">
            <div class="form-group">
                <label>Nama Anggota</label>
                <input type="text" name="nama_pengguna" class="form-control mt-2" placeholder="Nama Anggota">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control mt-2" placeholder="Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control mt-2" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="mt-2">Nomor Telepon</label>
                <input type="text" name="telp" class="form-control mt-2" placeholder="Nomor Telepon">
            </div>
            <div class="form-group">
                <label class="mt-2">Alamat Email</label>
                <input type="text" name="email" class="form-control mt-2" placeholder="Alamat Email">
            </div>
            <div class="form-group">
                <label class="mt-2">Alamat</label>
                <textarea name="alamat" class="form-control mt-2 mb-5" placeholder="Alamat"></textarea>
            </div>

            <button type="submit" class="btn btn-outline-primary mb-5" name="tambah-anggota">Tambah</button>
            <button type="reset" class="btn btn-outline-danger mb-5">Batal</button>
            <a href="?page=data-anggota" class="btn btn-outline-secondary mb-5">Kembali</a>

        </form>
    </div>
</div>