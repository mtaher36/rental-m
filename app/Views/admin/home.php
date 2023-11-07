<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                <?php endif ?>
                <div class="row">
                    <!-- Buku Card -->
                    <div class="col-xxl-6 col-md-6 col-xl-6">
                        <div class="card info-card buku-card">

                            <div class="card-body">
                                <h5 class="card-title">Data Katalog</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-journal-text"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $totalKatalog; ?></h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Buku Card -->
                    <!-- Buku Card -->
                    <div class="col-xxl-6 col-md-6 col-xl-6">
                        <div class="card info-card buku-card">

                            <div class="card-body">
                                <h5 class="card-title">Data Reviews</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $totalReviews; ?></h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Buku Card -->


                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <!-- Awal Recent Data Buku -->
                    <div class="col-12">
                        <div class="card recent-buku overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Recent Data Katalog <span>| Today</span></h5>
                            </div>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Sampul</th>
                                        <th scope="col">Merk Motor</th>
                                        <th scope="col">Jenis Motor</th>
                                        <th scope="col">Tahun Kendaraan</th>
                                        <th scope="col">CC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($katalog as $k) : ?>
                                        <tr>
                                            <th scope="row"> <?= $i++; ?></th>
                                            <td><img src="/img/cover/<?= $k['sampul']; ?>" alt="" class="sampul"></td>
                                            <td><?= $k['judul']; ?></td>
                                            <td><?= $k['jenis']; ?></td>
                                            <td><?= $k['tahun']; ?></td>
                                            <td><?= $k['cc']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- akhir recent table data buku -->

                    <div class="col-lg-12">
                        <!-- awal dari kategori data -->

                        <div class="card recent-peminjaman overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Recent Data Reviews <span>| Today</span></h5>
                            </div>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Client</th>
                                        <th scope="col">Pesan</th>
                                        <th scope="col">Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($reviews as $k) : ?>
                                        <?php $rating = $k['bintang']; ?>
                                        <?php $jumlahBintang = floor($rating); ?>
                                        <tr>
                                            <th scope="row"> <?= $i++; ?></th>
                                            <td><?= $k['nama_client']; ?></td>
                                            <td><?= $k['pesan']; ?></td>
                                            <td><?php for ($i = 0; $i < $jumlahBintang; $i++) :  ?>
                                                    <i class="bi bi-star-fill"></i>
                                                <?php endfor; ?>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- akhir recent table data kategori -->
                </div>
            </div>

    </section>
</main>


<?= $this->endSection(); ?>