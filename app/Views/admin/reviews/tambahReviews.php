<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Reviews</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Data Reviews</li>
                <li class="breadcrumb-item active">Tambah Reviews</li>
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
                <form action="/reviews/create" method="POST" class="row g-3" enctype='multipart/form-data'>
                    <?= csrf_field() ?>
                    <div class="col-md-12">
                        <label for="nama_client" class="form-label">Nama Client</label>
                        <input type="text" class="form-control" id="nama_client" name="nama_client" autofocus value="<?= old('nama_client'); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="bintang">Rating</label>

                        <select class="form-select" name="bintang" id="bintang" aria-label="Default select example">
                            <option selected>Rating</option>
                            <option value="1" <?= old('bintang') === '1' ? 'selected' : '' ?>>1</option>
                            <option value="2" <?= old('bintang') === '2' ? 'selected' : '' ?>>2</option>
                            <option value="3" <?= old('bintang') === '3' ? 'selected' : '' ?>>3</option>
                            <option value="4" <?= old('bintang') === '4' ? 'selected' : '' ?>>4</option>
                            <option value="5" <?= old('bintang') === '5' ? 'selected' : '' ?>>5</option>
                        </select>

                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="pesan">Pesan</label>
                        <textarea class="form-control" placeholder="Masukan Pesan" id="pesan" style="height: 100px;" name="pesan" value="<?= old('pesan'); ?>"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/reviews">Back</a>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
        </div>

    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>