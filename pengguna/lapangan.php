<div class="container">
    <header>
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal text-body-emphasis">Lapangan</h1>
            <p class="fs-5 text-body-secondary">Pilih Nomor Lapangan Yang Anda Inginkan</p>
        </div>
    </header>
    <div class="row row-cols-1 row-cols-md-4 mb-3">
        <div class="col ">
            <div class="col-3 mb-3">
                <div class="card" style="width: 10rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">No.1</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Pesan
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="col-12">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal" placeholder=""
                                                    value="" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="jam" class="form-label">Jam Booking</label>
                                                <input type="datetime" class="form-control" id="jam" placeholder=""
                                                    value="" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="durasi" class="form-label">Durasi</label>
                                                <input type="range" class="form-control" id="durasi" placeholder=""
                                                    value="" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<?php 
include ('index.php');
?>