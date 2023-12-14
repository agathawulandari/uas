<h2 class="text-center mt-5">Data Lapangan</h2>


<div class="row mt-5">
    <div class="col-md-12">
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

    
        <a href="?page=tambah-lapangan" class="btn btn-outline-primary">Tambah Data</a>

        <table class="table table-bordered mt-2 text">
            <thead class="text-center">
                <tr>
                    <th>#</th>
                    <th>Nama Lapangan</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                    $data = mysqli_query($koneksi, "SELECT * FROM kategori, lapangan WHERE lapangan.id_kategori=kategori.id_kategori ");
                    while ($d = mysqli_fetch_array($data)){
        
                ?>
        
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $d['nama_lapangan']; ?></td>
                    <td><?php echo $d['nama_kategori']; ?></td>
                    <td><?php echo $d['deskripsi']; ?></td>
                    <td><?php echo $d['harga_kategori']; ?></td>
                    <td><a href="?page=edit-anggota&nama=<?php echo $d['nama_lapangan']; ?>" class="btn btn-sm btn-outline-warning">Edit</a></td>
                    <td><a href="?page=hapus-anggota&nama=<?php echo $d['nama_lapangan']; ?>" class="btn btn-sm btn-outline-danger">Hapus</a></td>
                </tr>
        
                <?php 
                    $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>