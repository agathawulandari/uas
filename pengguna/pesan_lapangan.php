<?php 
include('../koneksi.php');
?>
<header>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal text-body-emphasis">Pesan</h1>
        <p class="fs-5 text-body-secondary">Silahkan isi from pemesanan lapangan</p>
    </div>
</header>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="" value="" required
                    disabled>
            </div>
            <div class="col-12">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="" value="" required
                    disabled>
            </div>
            <div class="col-12">
                <label for="lapangan" class="form-label">Lapangan</label>
                <input type="text" class="form-control" id="lapangan" name="lapangan" placeholder="" value="" required
                    disabled>
            </div>
            <hr>
            <div class="col-12">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="" value="" required>
            </div>
            <div class="col-12">
                <label for="jam" class="form-label">Jam Booking</label>
                <input type="time" class="form-control" id="jam" name="jam" placeholder="" value="" required>
            </div>
            <div class="col-12">
                <label for="durasi" class="form-label">Durasi</label>
                <input type="time" class="form-control" id="durasi" name="durasi" placeholder="" value="" required>
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary" name="pesan">Pesan</button>
            </div>
        </form>
    </div>
</body>