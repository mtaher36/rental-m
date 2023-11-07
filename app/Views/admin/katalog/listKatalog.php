<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>List Katalog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Katalog</li>
                <li class="breadcrumb-item active">List Katalog</li>
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
                        <!-- <a href="" class="btn btn-primary mt-3 mx-2">Export</a> -->
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>

                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Sampul</th>
                                    <th scope="col">Merk Motor</th>
                                    <th scope="col">Jenis Motor</th>
                                    <th scope="col">Tahun Kendaraan</th>
                                    <th scope="col">CC</th>
                                    <th scope="col">Aksi</th>
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
                                        <td>
                                            <a href="/katalog/edit/<?= $k['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                            <form action="/katalog/delete/<?= $k['id']; ?> " method="post" class="d-inline">
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