<h2 class="text-center mt-5">Data Anggota</h2>


<div class="row mt-5">
    <div class="col-md-12">

        <table class="table table-bordered mt-2 text">
            <thead class="text-center">
                <tr>
                    <th>#</th>
                    <th>Nama Anggota</th>
                    <th>Username</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat Email</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                    $data = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE tipe_akses=3");
                    while ($d = mysqli_fetch_array($data)){
        
                ?>
        
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $d['nama_pengguna']; ?></td>
                    <td><?php echo $d['username']; ?></td>
                    <td><?php echo $d['telp']; ?></td>
                    <td><?php echo $d['email']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                </tr>
        
                <?php 
                    $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>