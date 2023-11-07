<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Katalog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Katalog</li>
                <li class="breadcrumb-item active">Edit Katalog</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('errors'); ?>
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        <?php endif ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Katalog</h5>

                <!-- error data -->
                <!-- Multi Columns Form -->
                <form action="/katalog/update/<?= $katalog['id']; ?>" method="POST" class="row g-3" enctype='multipart/form-data'>
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" value="<?= $katalog['id']; ?>">
                    <div class="col-md-12">
                        <label for="judul" class="form-label">Merk Motor</label>
                        <input type="text" class="form-control" id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $katalog['judul']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="jenis">Jenis Motor</label>

                        <select class="form-select" name="jenis" id="jenis" aria-label="Default select example">
                            <option selected>Jenis Motor</option>
                            <option value="Matic" <?= old('jenis', $katalog['jenis']) === 'Matic' ? 'selected' : ''; ?>>Matic</option>
                            <option value="Gigi" <?= old('jenis', $katalog['jenis']) === 'Gigi' ? 'selected' : ''; ?>>Gigi</option>
                            <option value="Kopling" <?= old('jenis', $katalog['jenis']) === 'Kopling' ? 'selected' : ''; ?>>Kopling</option>
                        </select>

                    </div>
                    <div class="col-md-4">
                        <label for="tahun" class="form-label">Tahun Kendaraan</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" value="<?= (old('tahun')) ? old('tahun') : $katalog['tahun']; ?>">
                    </div>

                    <div class="col-md-4">
                        <label for="cc" class="form-label">CC</label>
                        <input type="number" class="form-control" id="cc" name="cc" value="<?= (old('cc')) ? old('cc') : $katalog['cc']; ?>">
                    </div>
                    <div class="col-12">
                        <?php if (!empty($katalog['sampul'])) : ?>
                            <label for="sampul" class="form-label">Sampul</label>
                            <input class="form-control" type="file" id="sampul" name="sampul" value="<?= $katalog['sampul']; ?>">
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($katalog['sampul'])) : ?>
                        <div>File saat ini: <?= $katalog['sampul']; ?></div>
                    <?php endif; ?>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/katalog">back</a>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
        </div>

    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>