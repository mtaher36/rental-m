<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>List Reviews</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Reviews</li>
                <li class="breadcrumb-item active">List Reviews</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <?php if (session()->getFlashdata('sukses')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('sukses'); ?>
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                <?php endif ?>

                <div class="card">
                    <div class="card-body">
                        <a href="" class="btn btn-success mt-3 mx-2"><i class="ri-file-excel-2-line"></i><span class="mx-2">Import</span></a>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>

                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Client</th>
                                    <th scope="col">Pesan</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Aksi</th>
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
                                        <td>
                                            <a href="/reviews/edit/<?= $k['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                            <form action="/reviews/delete/<?= $k['id']; ?> " method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">

                                                <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal" onclick="return confirm('apakah anda yakin?')"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>

    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>