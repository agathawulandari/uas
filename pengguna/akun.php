<div class="container">
    <div class="py-5 text-center">
        <h2>AKUN</h2>
    </div>

    <div class="row">
        <div class="form-group mb-2">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama_pengguna" value="<?php echo $row['nama_pengguna']??null;?>">
        </div>
        <div class="form-group mb-2">
            <label>Username</label>
            <input type="text" class="form-control" name="username" disabled value="<?php echo $row['username']??null;?>">
        </div>
        <div class="form-group mb-2">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $row['email']??null;?>">
        </div>
        <div class="form-group mb-2">
            <label>Telpon</label>
            <input type="text" class="form-control" name="telp" value="<?php echo $row['telpon']??null?>">
        </div>
        <div class="form-group mb-2">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']??null?>">
        </div>
    </div>
</div>