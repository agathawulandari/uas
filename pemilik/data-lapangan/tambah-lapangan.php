<h2 class="text-center mt-5">Tambah Data Lapangan</h2>

<div class="row mt-4">
    <div class="col">
        <form action="data-lapangan/lapangan-aksi.php" method="post">
            <div class="form-group">
                <label>Nama Lapangan</label>
                <input type="text" name="nama_lapangan" class="form-control mt-2" placeholder="Nama Lapangan">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="nama_kategori" class="form-control mt-2" placeholder="Kategori">
            </div>
            <div class="form-group">
                <label class="mt-2">Deskripsi</label>
                <textarea name="deskripsi" class="form-control mt-2" placeholder="Deskripsi"></textarea>
            </div>
            <div class="form-group">
                <label class="mt-2">Harga</label>
                <input type="text" name="harga" class="form-control mt-2 mb-5" placeholder="Harga">
            </div>

            <button type="submit" class="btn btn-outline-primary mb-5" name="tambah-lapangan">Tambah</button>
            <button type="reset" class="btn btn-outline-danger mb-5">Batal</button>
            <a href="?page=data-lapangan" class="btn btn-outline-secondary mb-5">Kembali</a>

        </form>
    </div>
</div>